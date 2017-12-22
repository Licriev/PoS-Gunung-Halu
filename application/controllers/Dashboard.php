<?php
class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}


	public function index(){

		$data = array();

		$this->layout->render();
	}

	public function test_page(){

		$data = array();

		//memberi title pada bagian title bar/tab, pada tag <title>
		$data['top_title'] = 'Dashboard';

		//memberi title halaman
		$data['title'] = 'Test Page';

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

	public function test_lib(){
		$data = array();

		$this->layout->set_header("Test Lib Page");
		$this->layout->set_title("Halaman Test Lib");
		$this->layout->set_titlesmall('small title');
		$this->layout->set_breadcrumb('Dashboard',base_url());
		$this->layout->set_breadcrumb('Test Lib');

		$this->layout->set_style(base_url('assets')."/css/pgs_custom.css");
		$this->layout->set_style(base_url('assets')."/css/pgs_custom.css");

		$this->layout->set_script(base_url('assets')."/build/js/custom.min.js");
		$this->layout->set_script(base_url('assets')."/build/js/custom.min.js");

		$this->layout->set_head_tag('test_headfoot');
		$this->layout->set_foot_tag('test_headfoot');

		$this->layout->set_content('view_test_page');
		$this->layout->render($data);

	}
}
?>