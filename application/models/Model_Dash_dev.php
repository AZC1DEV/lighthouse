<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Dash_dev extends CI_Model
{       
    function __construct(){
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }


    function dash_wamas_og002($customer_type){
        if($customer_type == 'customer_only'){
            $result = $this->db->query("SELECT * FROM `connect_report_wamas_og002_customer` WHERE  report_wamas_status is not null")->result_array();
            return $result;
        }else{
            $result = $this->db->query("SELECT * FROM `connect_report_wamas_og002` WHERE  report_wamas_status is not null")->result_array();
            return $result;
        }
  
    }
    // function dash_wamas_og002_monthly($month){
        
    //     $result = $this->db->query("SELECT * FROM `connect_report_wamas_og002_monthly` 
    //                 WHERE og002_monthly_month = '$month'
    //                 AND  og002_monthly_status is not null ORDER by og002_monthly_id DESC LIMIT 1")->result_array();
    //     return $result;
    // }

    function dash_wamas_og002_daily($month,$customer_type){
        
      
        if($customer_type == 'customer_only'){
            $result = $this->db->query("SELECT * FROM `connect_report_wamas_og002_dailys_customer` 
                WHERE og002_dailys_day = '$month'
                AND  og002_dailys_status is not null ORDER by 	og002_dailys_id  DESC LIMIT 1")->result_array();
            return $result;
        }else{
            $result = $this->db->query("SELECT * FROM `connect_report_wamas_og002_dailys` 
                    WHERE og002_dailys_day = '$month'
                    AND  og002_dailys_status is not null ORDER by 	og002_dailys_id  DESC LIMIT 1")->result_array();
            return $result;

        }
    }

 


}
