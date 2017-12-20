<?php
class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}


	public function index(){

		$data = array();
		$data['sub_view'] = 'view_dashboard';

		$this->load->view('main_view',$data, FALSE);
	}

	public function test_page(){

		$data = array();
		$data['sub_view'] = 'view_test_page';

		$this->load->view('main_view', $data, FALSE);
	}
}


?>