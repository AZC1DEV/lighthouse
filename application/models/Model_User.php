<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_User extends CI_Model
{       
    function __construct(){
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);


    }
//     var $ttesc_ln_access_token = '$2a$10$WeiSBIsCA03L6M.WcwQ4I.A3jaTqAwYhCXUEa3tTOx2mX81yUnyae';
//     var $url = 'https://fam.toat.co.th:5001/';
//    // $Url =  'https://180.180.243.126:5001/TTESC_LnMemberStatus';

//     public function SetUserConnect($data){

//         $ts_user_connect_user_member_no     = $data['ts_user_connect_user_member_no'];     
//         $ts_user_connect_user_idcard        = $data['ts_user_connect_user_idcard'];  
//         $ts_user_connect_line_uid           = $data['ts_user_connect_line_uid'];     

//         $user_line_detail['user_line_uid']      = $data['user_line_uid'];  
//         $user_line_detail['user_line_name']     = $data['user_line_name'];  
//         $user_line_detail['user_line_pic_url']  = $data['user_line_pic_url'];  
//         $user_line_detail['user_line_os']       = $data['user_line_os'];  


//         $data_insert = array(
//             'ts_user_connect_id'                 => NULL,
//             'ts_user_connect_user_member_no'     => $ts_user_connect_user_member_no,
//             'ts_user_connect_user_idcard'        => $ts_user_connect_user_idcard,
//             'ts_user_connect_line_uid'           => $ts_user_connect_line_uid,
//             'ts_user_connect_user_line_detail'   => json_encode($user_line_detail),
//             'ts_user_connect_datetime'           => date("Y-m-d H:i:s"),
//         );
 
//         $result_check = $this->db->query(" SELECT * FROM `toat_savings_user_connect` 
//                              WHERE `ts_user_connect_user_member_no` = '$ts_user_connect_user_member_no' 
//                              AND `ts_user_connect_user_idcard` = '$ts_user_connect_user_idcard' ")->result_array();

//         if(sizeof($result_check) == 0){
            
//             $this->db->insert('toat_savings_user_connect', $data_insert);
//             if(($this->db->affected_rows() != 1) ? false : true){

//                 $data['ts_user_connect_id'] =  $ts_user_connect_user_member_no;  
//                 $data['ts_user_log_action'] = 'login';
//                 $this->InsertUserLog($data);

//                 return  array(  'status' => "true" , 'result' => "Login true" );
//             }else{
//                 return  array(  'status' => "false" , 'result' => "Login false" );
//             }

//         }else{

//             $ts_user_connect_id = $result_check[0]['ts_user_connect_id'];

//             $this->db->where('ts_user_connect_id',  $ts_user_connect_id)
//             ->set(
//                 array( 
               
//                     'ts_user_connect_line_uid'           => $ts_user_connect_line_uid,
//                     'ts_user_connect_user_line_detail'   => json_encode($user_line_detail),
//                     'ts_user_connect_datetime'           => date("Y-m-d H:i:s"),

//                     )) ->update('toat_savings_user_connect');
                   
                
//             if ($this->db->trans_status() === false) {
//                 $this->db->trans_rollback();

//                 return  array(  'status' => "false" , 'result' => "Login false" );

//             } else {

//                 $this->db->trans_commit();
                
//                 $data['ts_user_connect_id'] =  $ts_user_connect_user_member_no;  
//                 $data['ts_user_log_action'] = 'login';
//                 $this->InsertUserLog($data);

//                 return  array(  'status' => "true" , 'result' => "Login true" );
//             }
         
//         }

       
//     }

//     public function CheckUserLoginWithUid($data){

//         $ts_user_connect_line_uid = $data['user_line_uid'];  

//         $result_check = $this->db->query(" SELECT * FROM `toat_savings_user_connect` 
//             WHERE `ts_user_connect_line_uid` = '$ts_user_connect_line_uid'
//             ORDER BY `toat_savings_user_connect`.`ts_user_connect_id`  DESC LIMIT 1 ")->result_array();
        
//         return $result_check;

//     }


//     public function Logout($data){

//             $ts_user_connect_id                 = $data['ts_user_connect_id'];
//             $ts_user_connect_user_member_no     = $data['ts_user_connect_user_member_no'];
//             $this->db->where('ts_user_connect_id',  $ts_user_connect_id)
//             ->set(
//                 array( 
               
//                     'ts_user_connect_line_uid'           => NUll,
//                     'ts_user_connect_user_line_detail'   => NUll,
//                     'ts_user_connect_datetime'           => date("Y-m-d H:i:s"),
    
//                     )) ->update('toat_savings_user_connect');
                   
                
//             if ($this->db->trans_status() === false) {
//                 $this->db->trans_rollback();
    
//                 return  array(  'status' => "false" , 'result' => "Logout_false" );
    
//             } else {
    
//                 $this->db->trans_commit();
               
//                 $data['ts_user_connect_id'] =  $ts_user_connect_user_member_no;  
//                 $data['ts_user_log_action'] = 'logout';
//                 $this->InsertUserLog($data);
//                 return  array(  'status' => "true" , 'result' => "Logout_true" );
//             }
      

    
     
     
//     }

//     public function InsertUserLog($data){
//         $ts_user_connect_id = $data['ts_user_connect_id'];   
//         $ts_user_log_action = $data['ts_user_log_action'];
//         $user_line_detail['user_line_uid']      = $data['user_line_uid'];  
//         $user_line_detail['user_line_name']     = $data['user_line_name'];  
//         $user_line_detail['user_line_pic_url']  = $data['user_line_pic_url'];  
//         $user_line_detail['user_line_os']       = $data['user_line_os']; 

      
//         $data_insert = array(
//             'ts_user_log_id'                    => NULL,
//             'ts_user_connect_id'                => $ts_user_connect_id,
//             'ts_user_log_action'                => $ts_user_log_action,
//             'ts_user_log_user_line_detail'      => json_encode($user_line_detail),
//             'ts_user_log_datetime'              => date("Y-m-d H:i:s"),
//         );
 
//         $this->db->insert('toat_savings_user_log', $data_insert);
//         if(($this->db->affected_rows() != 1) ? false : true){

//             return  array(  'status' => "true" , 'result' => "InsertUserLog true" );
//         }else{
//             return  array(  'status' => "false" , 'result' => "InsertUserLog false" );
//         }
//     }

//     // **********************************  https://fam.toat.co.th:5001/ ************************************************
//     public function Login($data){
   
//         // $Url = $this->url.'TTESC_LnMemberStatus';
    
//         // $body['member_no']  = $data['ts_user_connect_user_member_no'];
//         // $body['idcard']     = $data['ts_user_connect_user_idcard'];

//         // $ch = curl_init();
//         // curl_setopt($ch, CURLOPT_URL, $Url);
//         // curl_setopt($ch, CURLOPT_POST, true);
//         // curl_setopt($ch, CURLOPT_HTTPHEADER, array("ttesc_ln_access_token: $this->ttesc_ln_access_token",'Content-Type: application/json'));
//         // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//         // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $body ));

//         // $result = curl_exec($ch);
//         // curl_close($ch);
//         // return $result ;
        

//         $Url = $this->url.'TTESC_LnMemberStatus';
    
//         $body['member_no']  = $data['ts_user_connect_user_member_no'];
//         $body['idcard']     = $data['ts_user_connect_user_idcard'];

//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $Url);
//         curl_setopt($ch, CURLOPT_POST, true);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, array("ttesc_ln_access_token: $this->ttesc_ln_access_token",'Content-Type: application/json'));
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $body ));

//         $result = curl_exec($ch);
//         curl_close($ch);

//         $result = json_decode($result, true);
//         $result['last_update'] = $this->GetLastUpdate();
//         return $result;


//     }

//     public function GetLastUpdate(){
     
//         $Url = $this->url.'TTESC_getLastUpdateDate';
         
//         try {
//             $data = $Url;
//             $data = file_get_contents($data);
//             $data = json_decode($data, true);
//             $result = array( 
//                 'status' => true ,
//                 'result' => $data
//             );
          
//         } catch (Error $err) {
//             $result = array( 
//                 'status' => true ,
//                 'result' => "error"
//             );
//         } 
//         return $result;

//     }

//     public function GetMemberLoan($data){

//         $Url = $this->url.'TTESC_LnGetMemberLoan';
     
//         $body['member_no']  = $data['ts_user_connect_user_member_no'];
    
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $Url);
//         curl_setopt($ch, CURLOPT_POST, true);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, array("ttesc_ln_access_token: $this->ttesc_ln_access_token",'Content-Type: application/json'));
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $body ));

//         $result = curl_exec($ch);
//         curl_close($ch);
//         return $result ;
//     }

//     public function GetMemberGuarantee($data){

//         $Url = $this->url.'TTESC_LnGetMemberGuarantee';

//         $body['member_no']  = $data['ts_user_connect_user_member_no'];
    
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $Url);
//         curl_setopt($ch, CURLOPT_POST, true);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, array("ttesc_ln_access_token: $this->ttesc_ln_access_token",'Content-Type: application/json'));
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $body ));

//         $result = curl_exec($ch);
//         curl_close($ch);
//         return $result ;
//     }

//     public function GetMemberSaving($data){

//         $Url = $this->url.'TTESC_LnGetMemberSaving';

//         $body['member_no']  = $data['ts_user_connect_user_member_no'];
    
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $Url);
//         curl_setopt($ch, CURLOPT_POST, true);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, array("ttesc_ln_access_token: $this->ttesc_ln_access_token",'Content-Type: application/json'));
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $body ));

//         $result = curl_exec($ch);
//         curl_close($ch);
//         return $result ;
//     }

//     public function GetReceiveGain($data){
//         $Url = $this->url.'TTESC_LnGetReceiveGain';

//         $body['member_no']  = $data['ts_user_connect_user_member_no'];
    
//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $Url);
//         curl_setopt($ch, CURLOPT_POST, true);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, array("ttesc_ln_access_token: $this->ttesc_ln_access_token",'Content-Type: application/json'));
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $body ));

//         $result = curl_exec($ch);
//         curl_close($ch);
//         return $result ;
//     }

//     public function GetDepositStatement($data){
//         $Url = $this->url.'TTESC_LnGetDepositStatement';

//         $body['member_no']  = $data['ts_user_connect_user_member_no'];
//         $body['idcard']     = $data['ts_user_connect_user_idcard'];
//         $body['acno']       = $data['acno'];

//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $Url);
//         curl_setopt($ch, CURLOPT_POST, true);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, array("ttesc_ln_access_token: $this->ttesc_ln_access_token",'Content-Type: application/json'));
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $body ));

//         $result = curl_exec($ch);
//         curl_close($ch);
//         return $result ;
//     }

//     public function GetMemberDividend($data){
//         $Url = $this->url.'TTESC_LnGetMemberDividend';

//         $body['member_no']  = $data['ts_user_connect_user_member_no'];
//         $body['idcard']     = $data['ts_user_connect_user_idcard'];
     

//         $ch = curl_init();
//         curl_setopt($ch, CURLOPT_URL, $Url);
//         curl_setopt($ch, CURLOPT_POST, true);
//         curl_setopt($ch, CURLOPT_HTTPHEADER, array("ttesc_ln_access_token: $this->ttesc_ln_access_token",'Content-Type: application/json'));
//         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//         curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode( $body ));

//         $result = curl_exec($ch);
//         curl_close($ch);
//         return $result ;
//     }
  
}
