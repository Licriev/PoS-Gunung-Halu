<?php
class Auth extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('model_operator');
	}
	function login(){
		$this->load->view('form_login');
	}

	function proses_login() {
		if($this->input->is_ajax_request())
		{
			$username = $this->input->post('username',true);
			$password = $this->input->post('password',true);

			$hasil = $this->model_operator->login($username);

			if($hasil['result']){
				if( password_verify($password,$hasil['password'])){

					$data_session = array(
						'id_operator' 	=> $hasil['operator_id'],
						'nama_operator'	=> $hasil['nama_lengkap'],
						'username'		=> $hasil['username']
					);
					$this->session->set_userdata('user_auth',$data_session);
					$this->model_operator->edit_user(array('username'=>$username),array('last_login'=>date('Y-m-d')));
					echo json_encode(array('result'=>true,'cek_username' => true));

				}else{
					echo json_encode(array('result'=>false,'cek_username' => true));

				}
			}else{
				echo json_encode(array('result'=>false,'cek_username'=>false));
			}
		}else{
			redirect(base_url(),'refresh');
		}

	}

	private function hash_password($password){
		return password_hash($password,PASSWORD_DEFAULT);
	  }


	function register()
	{
		$this->load->view('form_register');
	}

	function proses_regis(){
		$this->form_validation->set_rules('namaLengkap', 'Nama Lengkap', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');

		if($this->form_validation->run() === TRUE){

			$namaLenkap = $this->input->post('namaLengkap');
			$username =  $this->input->post('username');
			$password = $this->input->post('password');

			if($this->model_operator->cek_username('operator',$username))
			{

				echo json_encode(['username' => FALSE]);

			}else{
				$data = array(
					'nama_lengkap' => $namaLenkap,
					'username' => $username,
					'password' => $this->hash_password($password),
				);

				$this->model_operator->regis('operator',$data);
				echo json_encode(['result' => TRUE , 'username' => TRUE]);
			}

		}else{

			$error = validation_errors();

			echo json_encode(['error' => $error,'result' => FALSE]);

		}
	}


	function logout() {
		session_destroy();
		redirect(base_url(),'refresh');
	}


}
