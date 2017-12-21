<?php
class Model_operator extends CI_Model {
	function login($username,$password)
	{
		$cek = $this->db->get_where('operator',array('username'=>$username,'password'=>md5($password)));
		if($cek->num_rows()>0)
		{
			return 1;
		}
		else {
			return 0;
		}
	}

}


?>