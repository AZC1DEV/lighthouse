<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Dash extends CI_Model
{       
    function __construct(){
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
    }


    function dash_poolpos_categories(){
        // $result = $this->db->query("SELECT SUM(nhso_do_log_count_index) AS 'nhso_do_log_count_index' , nhso_do_log_detetime  
        // FROM connect_nhso_do_log 
        // WHERE nhso_do_log_count_index > 0 
        // group by CAST(nhso_do_log_detetime AS DATE)
        // ORDER BY nhso_do_log_detetime DESC limit 10")->result_array();

        $result = $this->db->query("SELECT nhso_do_log_detetime FROM connect_nhso_do_log 
        WHERE nhso_do_log_count_index > 0 
        GROUP BY CAST(nhso_do_log_detetime AS DATE)
        ORDER BY nhso_do_log_detetime DESC limit 10")->result_array();
        return $result;
    }
    
    function dash_poolpos_series($date){

        $result = $this->db->query(" SELECT nhso_do_log_count_index , nhso_do_log_detetime  FROM `connect_nhso_do_log` 
        WHERE nhso_do_log_detetime LIKE '$date%' 
        AND nhso_do_log_count_index > 0")->result_array();

        return $result;
    }

    function dash_poolpos_stock_process_daily(){

        $result = $this->db->query("SELECT * FROM `connect_sso_process_stock_log` 
        ORDER BY sso_process_stock_log_datetime DESC LIMIT 5")->result_array();
        return $result;
    }

    function dash_stock_process_all(){
        $result = $this->db->query("SELECT * FROM `connect_sso_process_stock_log` ")->result_array();
        return $result;
    }

    // function dash_transactions_tms_date(){
    //     $result = $this->db->query("SELECT tms_log_datetime FROM `connect_tms_log` GROUP BY CAST(tms_log_datetime AS DATE)")->result_array();
    //     return $result;
    // }

    function dash_transactions_tms_by_date($date){
        $result = $this->db->query("SELECT count(*) as count FROM `connect_tms_log` WHERE tms_log_datetime like '$date%'")->result_array();
        return $result;
    }
  
    
    function dash_transactions_sso_by_date($date){
        $result = $this->db->query("SELECT count(*) as count FROM `connect_sso_log` WHERE sso_log_datetime like '$date%'")->result_array();
        return $result;
    }


    function dash_log_report_release_wamas(){
        $result = $this->db->query("SELECT * FROM `connect_report_release_wamas_log`  
        ORDER BY `connect_report_release_wamas_log`.`release_wamas_log_id`  ASC")->result_array();
        return $result;
 
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
