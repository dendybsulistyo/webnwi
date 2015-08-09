<?php

class m_user extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function list_user() 
	{
		$r = $this->db->query("select username,email from user order by username");
		return $r;
	}
		

	function list_hak() 
	{
		$r = $this->db->query("select * from referensi_hak order by nama_hak");
		return $r;
	}
	

	function tambah_user_admin($username, $email) 
	{
		$this->db->query("insert into user(username,email, idblokir, tanggal_entry) values ('$username', '$email', '2', now() )");
		$last = mysql_insert_id();
		$this->db->query("insert into user_hak(iduser,idhak) values ('$last', '2')");	
		$this->db->query("insert into user_hak(iduser,idhak) values ('$last', '3')");	
	}

	function tambah_user_biasa($username, $email) 
	{
		$this->db->query("insert into user(username,email, idblokir, tanggal_entry) values ('$username', '$email', '2', now() )");
		$last = mysql_insert_id();
		$this->db->query("insert into user_hak(iduser,idhak) values ('$last', '3')");
	}
	
	function cek_user_eksis($email) 
	{
		$r= $this->db->query("select count(a.email) as j
									from 
										user a
									where 
									a.email='$email' "								
									);		
		return $r->row();

	}





	function cek_user($user) 
	{
		$r= $this->db->query("select count(a.username) as j,
									a.id,
									a.email,
									a.username,
									a.gelar_depan,
									a.nama_lengkap, 
									a.gelar_belakang, 
									a.idasalinstansi, 
									a.idblokir, 
									
									a.keterangan
									from 
										user a
									where 
									a.username=".$this->db->escape($user) 
									
									);		
		return $r->row();

	}

	function cek_hak($user) 
	{
		$r=$this->db->query("select 
									c.nama_hak
									from 
										user a, user_hak b, referensi_hak c 
									where 
									a.username=".$this->db->escape($user)."  and 
									a.id = b.iduser and 
									b.idhak = c.id
									");		
		return $r;

	}


}