<?php

class mmember extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		}


	//// cek ketemu 1 member atau tidak
	function cek_auth($email, $password) 
	{
		$r = $this->db->query("select nama, count(email) as jemail, password 
								from registrasi
								where 
								email='$email' and 
								password='$password' 
			");

		return $r->row();

		}

	///// untuk array pakai --->>>>> $this->db->insert('students', $data);
	


}