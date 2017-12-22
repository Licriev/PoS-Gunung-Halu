<?php
class Auth extends CI_Controller {
	function __construct() {
		parent::__construct();
		$this->load->model('model_operator');
	}

	function login() {
		if($this->input->is_ajax_request())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');			

			$hasil = $this->model_operator->login($username,$password);
			// print_r($hasil);

			if($hasil['result']){
				$data_session = array(
					'id_operator' 	=> $hasil['operator_id'], 
					'nama_operator'	=> $hasil['nama_lengkap'],
					'username'		=> $hasil['username']
				);

			 	$this->session->set_userdata('user_auth',$data_session);
			}

			
			echo json_encode(array('result'=>$hasil['result']));
		
		}else{
			redirect(base_url(),'refresh');
		}

	}

	function logout() {
		session_destroy();
		redirect(base_url(),'refresh');
	}


}

