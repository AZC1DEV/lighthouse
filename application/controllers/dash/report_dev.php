<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class report_dev extends CI_Controller {

	public function __construct(){

		parent::__construct();
		// $this->load->model('Model_Dash');
		$this->load->model('Model_Dash_dev');
		
	}


	public function index()
	{
		// $data = array();
		// $data['menu'] = $this->load->view('nav/nav_menu', '', true);
		// echo "<pre>".print_r($data,true)."</pre>";
	}

	public function report_wamas(){
		
		$data = array();
		$data['menu'] = $this->load->view('nav/nav_menu', '', true);
		$this->load->view('dash/dash_wamas_dev' ,$data);

	}

	public function report_wamas_data($customer_type){
		
		$dash_wamas_og002 = $this->Model_Dash_dev->dash_wamas_og002($customer_type);
		// echo "<pre>".print_r($dash_wamas_og002,true)."</pre>";
		
		$labels_all = array();
		$labels_finished = array();
		$labels_active = array();
		$labels_shipmen_planning = array();
		$labels_picking_planning = array();
		$x_labels_all = array();

		$sap_labels_all = array();
		$sap_labels_finished = array();
		$sap_labels_active = array();
		$sap_labels_shipmen_planning = array();
		$sap_labels_picking_planning = array();
		$sap_x_labels_all = array();

		
		$svmi_labels_all = array();
		$svmi_labels_finished = array();
		$svmi_labels_active = array();
		$svmi_labels_shipmen_planning = array();
		$svmi_labels_picking_planning = array();
		$svmi_x_labels_all = array();

		for ($i = 0; $i < sizeof($dash_wamas_og002) ; $i++) {
		
			$report_wamas_detail = $dash_wamas_og002[$i]['report_wamas_detail'];
			$report_wamas_detail = json_decode($report_wamas_detail,true);

			array_push($labels_all, $report_wamas_detail['all']['total']);
			array_push($labels_finished, $report_wamas_detail['all']['finished']);
			array_push($labels_active, $report_wamas_detail['all']['active']);
			array_push($labels_shipmen_planning, $report_wamas_detail['all']['shipmen_planning']);
			array_push($labels_picking_planning, $report_wamas_detail['all']['picking_planning']);
			array_push($x_labels_all, $dash_wamas_og002[$i]['report_wamas_datetime']);

			
			array_push($sap_labels_all, $report_wamas_detail['sap']['total']);
			array_push($sap_labels_finished, $report_wamas_detail['sap']['finished']);
			array_push($sap_labels_active, $report_wamas_detail['sap']['active']);
			array_push($sap_labels_shipmen_planning, $report_wamas_detail['sap']['shipmen_planning']);
			array_push($sap_labels_picking_planning, $report_wamas_detail['sap']['picking_planning']);
			array_push($sap_x_labels_all, $dash_wamas_og002[$i]['report_wamas_datetime']);

			array_push($svmi_labels_all, $report_wamas_detail['svmi']['total']);
			array_push($svmi_labels_finished, $report_wamas_detail['svmi']['finished']);
			array_push($svmi_labels_active, $report_wamas_detail['svmi']['active']);
			array_push($svmi_labels_shipmen_planning, $report_wamas_detail['svmi']['shipmen_planning']);
			array_push($svmi_labels_picking_planning, $report_wamas_detail['svmi']['picking_planning']);
			array_push($svmi_x_labels_all, $dash_wamas_og002[$i]['report_wamas_datetime']);
	
	
	   }
	

		$data['obd_all'] = array(
			'all' 				=> $labels_all,
			'finished' 			=> $labels_finished,
			'active'		 	=> $labels_active,
			'shipmen_planning'  => $labels_shipmen_planning,
			'picking_planning'  => $labels_picking_planning,
			'x_labels_all'		=> $x_labels_all
		);
		$data['obd_sap'] = array(
			'all' 				=> $sap_labels_all,
			'finished' 			=> $sap_labels_finished,
			'active'		 	=> $sap_labels_active,
			'shipmen_planning'  => $sap_labels_shipmen_planning,
			'picking_planning'  => $sap_labels_picking_planning,
			'x_labels_all'		=> $sap_x_labels_all
		);
		$data['obd_svmi'] = array(
			'all' 				=> $svmi_labels_all,
			'finished' 			=> $svmi_labels_finished,
			'active'		 	=> $svmi_labels_active,
			'shipmen_planning'  => $svmi_labels_shipmen_planning,
			'picking_planning'  => $svmi_labels_picking_planning,
			'x_labels_all'		=> $svmi_x_labels_all
		);
		// echo "<pre>".print_r($data,true)."</pre>";
		echo json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE );
	

	}

	public function dash_wamas_og002_monthly_data($month,$customer_type){
		// $month = '2023-10-01';
		$dash_wamas_og002_daily = $this->Model_Dash_dev->dash_wamas_og002_daily($month,$customer_type);
		// echo "<pre>".print_r($dash_wamas_og002_daily,true)."</pre>";
		// exit();

		$dash_wamas_og002_daily = $dash_wamas_og002_daily[0];

		$og002_dailys_data = json_decode($dash_wamas_og002_daily['og002_dailys_data'] , true);
		
		// echo "<pre>".print_r($og002_dailys_data,true)."</pre>";

			
		$labels_all = array();
		$labels_finished = array();
		$labels_active = array();
		$labels_shipmen_planning = array();
		$labels_picking_planning = array();
		$x_labels_all = array();

		$sap_labels_all = array();
		$sap_labels_finished = array();
		$sap_labels_active = array();
		$sap_labels_shipmen_planning = array();
		$sap_labels_picking_planning = array();
		$sap_x_labels_all = array();

		
		$svmi_labels_all = array();
		$svmi_labels_finished = array();
		$svmi_labels_active = array();
		$svmi_labels_shipmen_planning = array();
		$svmi_labels_picking_planning = array();
		$svmi_x_labels_all = array();

		for ($i = 0; $i < sizeof($og002_dailys_data['weeks']) ; $i++) {
			// print_r($i);

			$name = $og002_dailys_data['weeks'][$i]['name'];


			array_push($labels_all, $og002_dailys_data['weeks'][$i]['all']['total']);
			array_push($labels_finished, $og002_dailys_data['weeks'][$i]['all']['finished']);
			array_push($labels_active, $og002_dailys_data['weeks'][$i]['all']['active']);
			array_push($labels_shipmen_planning, $og002_dailys_data['weeks'][$i]['all']['shipmen_planning']);
			array_push($labels_picking_planning, $og002_dailys_data['weeks'][$i]['all']['picking_planning']);
			array_push($x_labels_all, $name);

			
			array_push($sap_labels_all, $og002_dailys_data['weeks'][$i]['sap']['total']);
			array_push($sap_labels_finished, $og002_dailys_data['weeks'][$i]['sap']['finished']);
			array_push($sap_labels_active, $og002_dailys_data['weeks'][$i]['sap']['active']);
			array_push($sap_labels_shipmen_planning, $og002_dailys_data['weeks'][$i]['sap']['shipmen_planning']);
			array_push($sap_labels_picking_planning, $og002_dailys_data['weeks'][$i]['sap']['picking_planning']);
			array_push($sap_x_labels_all, $name);

			array_push($svmi_labels_all, $og002_dailys_data['weeks'][$i]['svmi']['total']);
			array_push($svmi_labels_finished, $og002_dailys_data['weeks'][$i]['svmi']['finished']);
			array_push($svmi_labels_active, $og002_dailys_data['weeks'][$i]['svmi']['active']);
			array_push($svmi_labels_shipmen_planning, $og002_dailys_data['weeks'][$i]['svmi']['shipmen_planning']);
			array_push($svmi_labels_picking_planning, $og002_dailys_data['weeks'][$i]['svmi']['picking_planning']);
			array_push($svmi_x_labels_all, $name);
		}
		
		$data['last_update'] = $dash_wamas_og002_daily['og002_dailys_datetime'];
		$data['month_sum'] = $og002_dailys_data['month_sum'];
		$data['sum'] = array(
			'all' 				=> $og002_dailys_data['month_sum']['all']['total'],
			'finished' 			=> $og002_dailys_data['month_sum']['all']['finished'],
			'active'		 	=> $og002_dailys_data['month_sum']['all']['active'],
			'shipmen_planning'  => $og002_dailys_data['month_sum']['all']['shipmen_planning'],
			'picking_planning'  => $og002_dailys_data['month_sum']['all']['picking_planning'],
			'x_labels_all'		=> $og002_dailys_data['month']
			
		);
		
		$data['obd_all'] = array(
			'all' 				=> $labels_all,
			'finished' 			=> $labels_finished,
			'active'		 	=> $labels_active,
			'shipmen_planning'  => $labels_shipmen_planning,
			'picking_planning'  => $labels_picking_planning,
			'x_labels_all'		=> $x_labels_all
		);
		$data['obd_sap'] = array(
			'all' 				=> $sap_labels_all,
			'finished' 			=> $sap_labels_finished,
			'active'		 	=> $sap_labels_active,
			'shipmen_planning'  => $sap_labels_shipmen_planning,
			'picking_planning'  => $sap_labels_picking_planning,
			'x_labels_all'		=> $sap_x_labels_all
		);
		$data['obd_svmi'] = array(
			'all' 				=> $svmi_labels_all,
			'finished' 			=> $svmi_labels_finished,
			'active'		 	=> $svmi_labels_active,
			'shipmen_planning'  => $svmi_labels_shipmen_planning,
			'picking_planning'  => $svmi_labels_picking_planning,
			'x_labels_all'		=> $svmi_x_labels_all
		);

		// $data['x_labels_all'] = $svmi_x_labels_all;

		// echo "<pre>".print_r($data,true)."</pre>";
		echo json_encode($data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE );
	}


	public function dash_wamas_og002_daily_data_table($month,$customer_type){
		// $month = '2023-10-01';
		$dash_wamas_og002_daily = $this->Model_Dash_dev->dash_wamas_og002_daily($month,$customer_type);
		// echo "<pre>".print_r($dash_wamas_og002_daily,true)."</pre>";

		$dash_wamas_og002_daily = $dash_wamas_og002_daily[0];

		$og002_monthly_data = json_decode($dash_wamas_og002_daily['og002_dailys_data'] , true);
		
		// echo "<pre>".print_r($og002_monthly_data,true)."</pre>";
		// echo json_encode($og002_monthly_data, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE );



	
		
	
		$data_table = array();

		for ($i = 0; $i < sizeof($og002_monthly_data['days']) ; $i++) {

		

			$sub_array = array();
			// $sub_array[] = $i+1;
			$sub_array[] = $og002_monthly_data['days'][$i]['name'];
			$sub_array[] = $og002_monthly_data['days'][$i]['all']['total'];
			$sub_array[] = $og002_monthly_data['days'][$i]['all']['shipmen_planning'];
			$sub_array[] = $og002_monthly_data['days'][$i]['all']['picking_planning'];
			$sub_array[] = $og002_monthly_data['days'][$i]['all']['finished'];
			$data_table[] = $sub_array;

	   }

	   $output = array(
			"data" => $data_table,
		
	   );
	   echo json_encode($output);

			
	}


	public function dash_wamas_og002_table($month,$customer_type){
		$data['month'] = $month;
		$data['customer_type'] = $customer_type;
 		$this->load->view('dash/backup/dash_wamas_og002_tabel_dev',$data);
	}

	

	
}
