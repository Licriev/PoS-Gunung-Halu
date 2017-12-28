<?php
class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('model_operator');
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
				'link' => base_url(),
				'name' => 'auth/login',
			),
		);

		//load template utama
		$this->load->view('main_view', $data, FALSE);
	}

	public function test_lib(){
		$data = array();

		//judul tab/browser
		$this->layout->set_header("Test Page");

		//set judul halaman
		$this->layout->set_title("Test Title");

		//set sub judul halaman
		$this->layout->set_titlesmall('small title');

		//set breadcrumb
		$this->layout->set_breadcrumb('Dashboard',base_url());
		$this->layout->set_breadcrumb('Test Page');
		$this->layout->set_breadcrumb('Edit Page');
		
		//load css tambahan
		$this->layout->set_style(base_url('assets')."/css/pgs_custom.css");
		$this->layout->set_style(base_url('assets')."/css/pgs_custom.css");

		//load js tambahan
		$this->layout->set_script(base_url('assets')."/build/js/custom.min.js");
		$this->layout->set_script(base_url('assets')."/build/js/custom.min.js");


		$this->layout->set_head_tag('test_headfoot');

		$this->layout->set_foot_tag('test_headfoot');

		$this->layout->set_content('view_test_page');
		$this->layout->render($data);
	}
	public function users(){
		$data = array(
			'users' => $this->model_operator->tampil_users()
		);

		$this->layout->set_header("Test Lib Page");
		$this->layout->set_title("Users");
		$this->layout->set_titlesmall('berikut daftar operator');
		$this->layout->set_breadcrumb('Dashboard',base_url());
		$this->layout->set_breadcrumb('Users');

		$this->layout->set_style(base_url('assets')."/css/pgs_custom.css");
		$this->layout->set_style(base_url('assets')."/css/pgs_custom.css");

		$this->layout->set_script(base_url('assets')."/build/js/custom.min.js");
		$this->layout->set_script(base_url('assets')."/build/js/custom.min.js");

		$this->layout->set_head_tag('test_headfoot');
		$this->layout->set_foot_tag('test_headfoot');

		$this->layout->set_content('view_users');
		$this->layout->render($data);
	}
	public function edit_user()
	{
		$username = $this->uri->segment(3);
		$this->data['user'] = $this->model_operator->tampil_user(array('username'=>$username));
		if (!$this->data['user']) {
			redirect('dashboard/users');
		}
		$data = array(
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'username' => $this->input->post('username'),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
		);
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('passconf', 'Confirm Password', 'required|trim|matches[password]');
		if ($this->form_validation->run() === FALSE) {
			$this->layout->set_header("Test Lib Page");
			$this->layout->set_title("Users");
			$this->layout->set_titlesmall('berikut daftar operator');
			$this->layout->set_breadcrumb('Dashboard',base_url());
			$this->layout->set_breadcrumb('Users');

			$this->layout->set_style(base_url('assets')."/css/pgs_custom.css");
			$this->layout->set_style(base_url('assets')."/css/pgs_custom.css");

			$this->layout->set_script(base_url('assets')."/build/js/custom.min.js");
			$this->layout->set_script(base_url('assets')."/build/js/custom.min.js");

			$this->layout->set_head_tag('test_headfoot');
			$this->layout->set_foot_tag('test_headfoot');

			$this->layout->set_content('view_edituser');
			$this->layout->render($this->data);
		} else {
			if ($this->model_operator->edit_user(array('username'=>$username), $data)) {
				echo json_encode(array('result'=>true));
			}
		}
	}
	public function delete_user()
	{
		$data['username'] = $this->uri->segment(3);
		$this->model_operator->_delete('operator', $data);
	}
}
?>
