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
		$r = $this->db->query("select id, nama, count(email) as jemail, password 
								from registrasi
								where 
								email='$email' and 
								password='$password' 
			");

		return $r->row();

		}

	///// untuk array pakai --->>>>> $this->db->insert('students', $data);
	

	function cek_member($session_id) {
		$r = $this->db->query("select id from member where id='$session_id' ");

		return $r->num_rows();
	}	


	function dashboard_member($session_id) {
		$r = $this->db->query("select *
								 from member 
								 where id='$session_id' ");


		return $r->row();
	}	



	//// insert data personal member
	function insert_personal($session_id, $nama, $panggilan, $tmp_lahir, $tgl_lahir, $gol_darah, $jenis_kelamin, 
								$alamat, $kode_pos, $telpon, $no_hp, $pekerjaan,  $gabung) 
	{

		// update nama di tabel registrasi
		$this->db->query("update registrasi set nama='$nama' where id='$session_id' ");
 
		
		// entry data ke tabel member
		$this->db->query("insert into member(id, panggilan, tmp_lahir, tgl_lahir, gol_darah, jenis_kelamin,
								alamat,  kode_pos, telpon, no_hp, pekerjaan, gabung) 
							values 
							('$session_id','$panggilan','$tmp_lahir', '$tgl_lahir', '$gol_darah', '$jenis_kelamin',
								'$alamat',  '$kode_pos' ,'$telpon', '$no_hp', '$pekerjaan',  '$gabung') ");


		}


	//// update data personal member
	function update_personal($session_id, $nama, $panggilan, $tmp_lahir, $tgl_lahir, $gol_darah, $jenis_kelamin,
		$alamat, $kode_pos, $telpon, $no_hp, $pekerjaan,  $gabung)  
	{

		// update nama di tabel registrasi
		$this->db->query("update registrasi set nama='$nama' where id='$session_id' ");

		// entry data ke tabel member
		$this->db->query("update member set 
								panggilan='$panggilan',
								tmp_lahir='$tmp_lahir',
								tgl_lahir='$tgl_lahir',				
								gol_darah='$gol_darah',
								jenis_kelamin='$jenis_kelamin',
								alamat='$alamat',
								kode_pos='$kode_pos',
								telpon='$telpon',
								no_hp='$no_hp',
								pekerjaan='$pekerjaan',		
								gabung='$gabung'

								where 
								id='$session_id' ");


		}




}