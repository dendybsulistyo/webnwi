<?php

class mregistrasi extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		}


	//// insert registrasi
	function insert_registrasi($nama, $email, $password) 
	{
		$this->db->query("insert into registrasi(nama, email, password, tgl_daftar) 
							values ('$nama', '$email', '$password' ,now() )");
		}

	///// untuk array pakai --->>>>> $this->db->insert('students', $data);
	
	// cek kode kode nwi
	function cek_kode($kode_nwi) 
	{
		$r = $this->db->query("select count(id) as jkode
								from kode_nwi 
								where kode_nwi='$kode_nwi' ");
		return $r->row();

		}



}