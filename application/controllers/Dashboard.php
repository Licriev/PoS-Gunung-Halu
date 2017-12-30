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
		$this->layout->set_header("Users");
		$this->layout->set_title("Users");
		$this->layout->set_breadcrumb('Dashboard',base_url());
		$this->layout->set_breadcrumb('Users');
		$this->layout->set_content('users_master/view_users');
		$this->layout->render($data);
	}
	public function profile()
	{
		$id = $this->session->userdata('user_auth')['id_operator'];
		$this->data['user'] = $this->model_operator->tampil_user(array('operator_id'=>$id));
		$this->layout->set_header("Profile");
		$this->layout->set_title("Profile");
		$this->layout->set_breadcrumb('Dashboard',base_url());
		$this->layout->set_breadcrumb('Profile');
		$this->layout->set_script(base_url('assets')."/js/users.js");
		$this->layout->set_foot_tag('users_master/jsfoot_users');
		$this->layout->set_content('users_master/view_edituser');
		$this->layout->render($this->data);
	}
	public function update_user()
	{
		$id = $this->session->userdata('user_auth')['id_operator'];
		$this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required|trim');
		$this->form_validation->set_rules('username', 'Username', 'required|trim');
		if ($this->form_validation->run() === TRUE) {
			$data = array(
				'nama_lengkap' => $this->input->post('nama_lengkap'),
				'username' => $this->input->post('username'),
			);
			if ($this->model_operator->edit_user(array('operator_id'=>$id), $data)) {
				echo json_encode(array('result'=>TRUE));
			}
		} else {

		}
	}
	public function update_password()
	{
		$id = $this->session->userdata('user_auth')['id_operator'];
		$result = $this->model_operator->tampil_user(['operator_id'=>$id]);
		$this->form_validation->set_rules('passold', 'Password Lama', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('passconf', 'Confirm Password', 'required|trim|matches[password]');
		if ($this->form_validation->run() === FALSE) {
			$error = validation_errors();
			echo json_encode(['error' => $error,'result' => FALSE]);
		} elseif (!password_verify($this->input->post('passold'), $result['password'])) {
			echo json_encode(array('passold'=>FALSE));
		}	else {
			$data['password'] = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
			if ($this->model_operator->edit_user(array('operator_id'=>$id), $data)) {
				echo json_encode(array('result'=>true));
			}
		}
	}
	public function delete_user()
	{
		$data['operator_id'] = $this->session->userdata('user_auth')['id_operator'];
		$this->model_operator->_delete('operator', $data);
		redirect('dashboard/users');
	}
}
?>
