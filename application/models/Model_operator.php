<?php
<<<<<<< HEAD:application/models/model_operator.php
class model_operator extends CI_Model {

	public function __construct(){
		parent::__construct();
		
	}

=======
class Model_operator extends CI_Model {
>>>>>>> c50817d59016ed9d9c5bd2a0becae0c04498f578:application/models/Model_operator.php
	function login($username,$password)
	{	
		$this->db->select('operator_id,nama_lengkap,username');
		$cek = $this->db->get_where('operator',array('username'=>$username,'password'=>md5($password)));

		$data = array();
		if($cek->num_rows() > 0){
			$data = $cek->row_array();
			$data['result'] = true;
			return $data;
		}else{
			$data['result'] = false;
			return $data;	
		}	
	}

}


?>