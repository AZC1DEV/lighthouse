<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model('Model_Dash');

		
	}


	public function index()
	{
		$data = array();

		$data['menu'] = $this->load->view('nav/nav_menu', '', true);
		// $this->load->view('nav/nav_menu');
		$this->load->view('dash/dash_main' ,$data);
		// $this->load->view('dash/dash_login');
	
	}

	public function dash_menu(){
		// $menu = $this->Model_Menu->menu_main();
		$msg = $this->load->view('nav/nav_menu', '', true);
		echo $msg;
	}


	public function dash_poolpos(){
		$dash_poolpos_categories = $this->Model_Dash->dash_poolpos_categories();
	
		sort($dash_poolpos_categories);
	
		$categories = array();
		$series[0]['name'] = 'auto';
		$series[0]['data'] = array();
		$series[1]['name'] = 'manual';
		$series[1]['data'] = array();

		for ($i = 0; $i < sizeof($dash_poolpos_categories) ; $i++) {
			$categories[$i] = date("Y-m-d",  strtotime($dash_poolpos_categories[$i]['nhso_do_log_detetime']));

			$dash_poolpos_series = $this->Model_Dash->dash_poolpos_series($categories[$i]);
			// echo "<pre>".print_r($dash_poolpos_series,true)."</pre>";
		
			$nhso_do_log_count_index = 0;
			if(sizeof($dash_poolpos_series) > 0){
				$count_auto = 0;
				$count_manual = 0;
				for ($index_poolpos_series = 0; $index_poolpos_series < sizeof($dash_poolpos_series) ; $index_poolpos_series++) {
					$nhso_do_log_detetime = date("H:i", strtotime($dash_poolpos_series[$index_poolpos_series]['nhso_do_log_detetime']));
					$time_auto = date("H:i", strtotime('15:45'));
					
					if($nhso_do_log_detetime == $time_auto){
						$count_auto = $count_auto + intval($dash_poolpos_series[$index_poolpos_series]['nhso_do_log_count_index']);
					
					}else{
						$count_manual = $count_manual + intval($dash_poolpos_series[$index_poolpos_series]['nhso_do_log_count_index']);
					}
	
					
				}
				array_push($series[0]['data'],$count_auto);
				array_push($series[1]['data'],$count_manual);
			}else{
				array_push($series[0]['data'],0);
				array_push($series[1]['data'],0);
			}
			
		
		
		}


		// echo "<pre>".print_r($categories,true)."</pre>";

		// echo "<pre>".print_r($series,true)."</pre>";
		
	
		$result['series'] = $series;
		$result['categories'] = $categories;
	
		echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE );
		
	}

	public function dash_stock_process_daily(){

		$dash_poolpos_stock_process_daily = $this->Model_Dash->dash_poolpos_stock_process_daily();
		
		sort($dash_poolpos_stock_process_daily);
		// echo "<pre>".print_r($dash_poolpos_stock_process_daily,true)."</pre>";
		$series[0]['data'] = [1000];
		$series[0]['name'] = 'stock count';
		$categories = [''];
		for ($i = 0; $i < sizeof($dash_poolpos_stock_process_daily) ; $i++) {
			$sso_process_stock_log_id = $dash_poolpos_stock_process_daily[$i]['sso_process_stock_log_row'];
			$sso_process_stock_log_datetime = date("M(d)", strtotime($dash_poolpos_stock_process_daily[$i]['sso_process_stock_log_datetime']));

			array_push($series[0]['data'],$sso_process_stock_log_id);
			array_push($categories,$sso_process_stock_log_datetime);
			
		}
		array_push($series[0]['data'],'');
		array_push($categories,'');

		// $series[0]['data'][0] = $series[0]['data'][1];

		$result['series'] = $series;
		$result['categories'] = $categories;
		echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE );

	}

	public function dash_stock_process_all(){
		$dash_stock_process_all = $this->Model_Dash->dash_stock_process_all();
		// echo "<pre>".print_r($dash_stock_process_all,true)."</pre>";

		$total = sizeof($dash_stock_process_all);
		$success = 0;
		$issue = 0;
		for ($i = 0; $i < sizeof($dash_stock_process_all) ; $i++) {
			if($dash_stock_process_all[$i]['sso_process_stock_log_status'] == 'true'){
				$success += 1;
			}else{
				$issue += 1;
			}
		}

		$per_success = intval(($success/$total)*100);
		$per_issue = intval(($issue/$total)*100);
		$result['labels'] = array('Success','Issue');
		$result['series'] = array($per_success,$per_issue);
		$result['master'] = array($total,$success,$issue);

		echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE );
	
	}


	public function dash_transactions_tms($month_number){

		$date_sting = date("Y-m-d", strtotime(date("Y-$month_number-01")));
		$now = strtotime(date("Y-m-d",strtotime($date_sting)));

		$last_sunday_week = date("Y-m-d", strtotime('last sunday, 12pm',$now));
		$first_day_month = date("Y-m-d", strtotime('first day of this month',$now));
		$last_day_month = date("Y-m-d", strtotime('last day of this month',$now));
	
		$date1=date_create($first_day_month);
		// $date2=date_create($last_day_month);
		$date2=date_create(date("Y-m-d"));
		$diff=date_diff($date1,$date2);

		$start_day = $first_day_month;
		$end_day = intval($diff->format("%a"));

		$day = array();
		$datasets[0]['label'] = 'TMS Transactions';
		$datasets[0]['data'] = array();
		$datasets[0]['backgroundColor'] = 'rgba(233, 30, 99, 99)';

		$datasets[1]['label'] = 'SSO Transactions';
		$datasets[1]['data'] = array();
		$datasets[1]['backgroundColor'] = 'rgba(0, 188, 212, 0.9)';
		

		for ($index_day = 0; $index_day <= $end_day ; $index_day++) {
			$day_ =  strtotime($start_day ."+".$index_day." days");
			$day_ = date('Y-m-d', $day_ );

			$count_tms = $this->Model_Dash->dash_transactions_tms_by_date($day_);
			$count_sso = $this->Model_Dash->dash_transactions_sso_by_date($day_);

			array_push($day, $day_);

			array_push($datasets[0]['data'],$count_tms[0]['count']);
			array_push($datasets[1]['data'],$count_sso[0]['count']);
		} 

		
		$result['labels'] = $day;
		$result['datasets'] = $datasets;
	
		echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE );
	
	
	}
	// function dash_test(){
	// 	$month_number = 9;

	// 	$date_sting = date("Y-m-d", strtotime(date("Y-$month_number-01")));
	// 	$now = strtotime(date("Y-m-d",strtotime($date_sting)));
		
	// 	$last_sunday_week = date("Y-m-d", strtotime('last sunday, 12pm',$now));
	// 	$first_day_month = date("Y-m-d", strtotime('first day of this month',$now));
	// 	$last_day_month = date("Y-m-d", strtotime('last day of this month',$now));
	
	// 	$date1=date_create($first_day_month);
	// 	$date2=date_create($last_day_month);
	// 	$diff=date_diff($date1,$date2);

	// 	$start_day = $first_day_month;
	// 	$end_day = intval($diff->format("%a"));

	// 	$day = array();
	// 	$datasets[0]['label'] = 'TMS Transactions';
	// 	$datasets[0]['data'] = array();
	// 	$datasets[0]['backgroundColor'] = 'rgba(233, 30, 99, 99)';

	// 	$datasets[1]['label'] = 'SSO Transactions';
	// 	$datasets[1]['data'] = array();
	// 	$datasets[1]['backgroundColor'] = 'rgba(0, 188, 212, 0.9)';
		

	// 	for ($index_day = 0; $index_day <= $end_day ; $index_day++) {
	// 		$day_ =  strtotime($start_day ."+".$index_day." days");
	// 		$day_ = date('Y-m-d', $day_ );

	// 		$count_tms = $this->Model_Dash->dash_transactions_tms_by_date($day_);
	// 		$count_sso = $this->Model_Dash->dash_transactions_sso_by_date($day_);

	// 		array_push($day, $day_);

	// 		array_push($datasets[0]['data'],$count_tms[0]['count']);
	// 		array_push($datasets[1]['data'],$count_sso[0]['count']);
	// 	} 

		
	// 	$result['labels'] = $day;
	// 	$result['datasets'] = $datasets;
	
	// 	// echo json_encode($result, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE );
	// 	echo "<pre>".print_r($result,true)."</pre>";

	// 	// echo date("Y-m-d",strtotime($date_sting));

	// 	$year = 2023;

	// 	$mondays_of_month = $this->getMondaysOfMonth($year, $month_number);

	// 	$set_data = array();
	// 	// print_r($mondays_of_month);
		
	// 	for ($i = 0; $i < sizeof($mondays_of_month) ; $i++) {
	// 	// foreach ($mondays_of_month as $monday) {
	// 		// echo $mondays_of_month[$i] . "\n";
	// 		// array_push($set_data, $day_);
	// 		echo "<pre>".print_r($mondays_of_month[$i],true)."</pre>";

	// 	}
	// }

	// function getMondaysOfMonth($year,$month) {

	// 	$mondays = array();
	
	// 	$start_date = new DateTime("$year-$month-01");
	// 	$end_date = new DateTime("$year-$month-" . date('t', strtotime("$year-$month-01")));
	
	// 	while ($start_date <= $end_date) {
	// 		if ($start_date->format('N') == 7) { // 1 represents Sunday in the 'N' format
	// 			$mondays[] = $start_date->format('Y-m-d');
	// 		}
	
	// 		$start_date->add(new DateInterval('P1D'));
	// 	}
	
	// 	return $mondays;
	// }
	

	
}
