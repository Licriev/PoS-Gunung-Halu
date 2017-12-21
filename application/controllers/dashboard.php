<?php
class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}


	public function index(){

		$data = array();
		$data['top_title'] = 'Dashboard';
		$data['sub_view'] = 'view_dashboard';


		$this->load->view('main_view',$data, FALSE);
	}

	public function test_page(){

		$data = array();
		//menentukan view halaman
		$data['sub_view'] = 'view_test_page';

		//membuat breadcrumb
		$data['breadcrumb'] = array(
			0 => array(
				'link' => base_url(),
				'name' => 'Dashboard',
			),
			2 => array(
				'link' => null,
				'name' => 'Test Page',
			),
			3 => array(
				'link' => base_url,
				'name' => 'auth/login',
			),
		);

		//load template utama
		$this->load->view('main_view', $data, FALSE);
	}
}
?>