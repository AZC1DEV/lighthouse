<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Service_ldap {
    private $CI;            /*!< CodeIgniter instance */
    protected $connection = NULL;
    protected $bind = NULL;

    private $host;
    private $port;
    private $account_prefix;
    private $account_suffix;
    private $base_dn;
    public $description = NULL;

    function __construct() {
        $this->CI = & get_instance();
        $this->CI->config->load('ldap', TRUE);
        $configs = $this->CI->config->item('ldap');               

        if( array_key_exists( 'ldap_host', $configs ) ) {
            $this->host = $configs['ldap_host'];
        }
        if( array_key_exists( 'ldap_port', $configs ) ) {
            $this->port = $configs['ldap_port'];
        }
        if( array_key_exists( 'account_prefix', $configs ) ) {
            $this->account_prefix = $configs['account_prefix'];
        }
        if( array_key_exists( 'account_suffix', $configs ) ) {
            $this->account_suffix = $configs['account_suffix'];
        }
        if( array_key_exists( 'base_dn', $configs ) ) {
            $this->base_dn = $configs['base_dn'];
        }
        return $this->connect();
    }
    
    function __destruct() {
        $this->close();
    }

    /**
    * Connect to LDAP server
    */
    public function connect() {
        try {
            $this->connection = @ldap_connect( $this->host, $this->ldap_port );
            ldap_set_option($this->connection, LDAP_OPT_PROTOCOL_VERSION, 3);
            ldap_set_option($this->connection, LDAP_OPT_REFERRALS, 0);
            if( !$this->connection ) {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
        return true;
    }

    /**
    * Authenticate to LDAP with username and password
    * @param $username
    * @param $password
    */
    public function authenticate( $username, $password ) {
        try {
            if( $this->connection ) {
                $bind = @ldap_bind($this->connection, $this->account_prefix.$username, $password);
                if( $bind ) {
                    /** TODO **/
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } catch( Exception $e ) {
            return false;
        }
        return true;
    }
    
    /**
    * Authenticate to LDAP with username and password
    * @param $username
    * @param $password
    */
    public function authenticate_ttm( $username, $password ) {
        try {
            if( $this->connection ) {
                $this->bind = @ldap_bind($this->connection, $username.$this->account_suffix, $password);
                if( $this->bind ) {
                    $attributes = array("firstname","displayname", "mail", "department", "title", "physicaldeliveryofficename", "manager");
                    $filter = "(&(sAMAccountName=$username))";
                    $result = ldap_search($this->connection, $this->base_dn, $filter, $attributes);
                    $entries = ldap_get_entries($this->connection, $result);
                    if($entries["count"] > 0){
                        $this->description = $entries[0]['displayname'][0];
                    }
                } else {
                    $this->description = 'No LDAP';
                    return false;
                }
            } else {
                $this->description = 'No LDAP';
                return false;
            }
        } catch( Exception $e ) {
            $this->description = 'No LDAP';
            return false;
        }
        return true;
    }

    /**
    * Close LDAP connection
    */
    public function close() {
        try {
            if( $this->connection ) {
                @ldap_close($this->connection);
            } else {
                return false;
            }
        } catch( Exception $e ) {
            return false;
        }
        return true;
    }
}