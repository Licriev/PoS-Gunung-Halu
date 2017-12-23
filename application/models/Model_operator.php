<?php

class Model_operator extends CI_Model {

	public function __construct(){
		parent::__construct();
		
	}


	function login($username)
	{	
		$this->db->select();
		$cek = $this->db->get_where('operator',array('username'=>$username));

		$isi = $cek->row();
		$data = array();
		if($cek->num_rows() != 1){
			$data['result'] = false;
			$data['cek_username'] = false;
			return $data;
		}else{
			$data = $cek->row_array();
			$data['result'] = true;
			$data['cek_username'] = true;
			return $data;
		}	
	}

	function regis($tabel,$data)
	{
		$this->db->insert($tabel,$data);
	}

	public function cek_username($tabel,$username)
	{
		return $this->db->select('username')
				 ->from($tabel)
				 ->where('username',$username)
				 ->get()->result();
	  }
	

}


?>