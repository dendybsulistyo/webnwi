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
	

	// ketemu 1 atau tidak
	function cek_member($session_id) {
		$r = $this->db->query("select count(id) as id from member where id='$session_id' ");

		return $r->row();
	}	


	function dashboard_member($session_id) {
		$r = $this->db->query("select 
									a.id, 
									a.panggilan,
									a.tmp_lahir,
									a.tgl_lahir,
									a.gol_darah,
									a.jenis_kelamin,
									a.alamat,
									a.kode_pos,
									a.telpon,
									a.no_hp,
									a.pekerjaan,
									a.gabung,
									b.no_stnk,
									b.no_polisi,
									c.file_foto
									
								 from member a, kendaraan b, foto c
								 where 
								 a.id=b.id and  
								 a.id='$session_id' and 
								 c.id='$session_id' 
								 ");


		return $r->row();
	}	

		function dashboard_kendaraan($session_id) {
		$r = $this->db->query("select id,
									no_stnk,
									no_polisi
								 from kendaraan  
								 where 
								 id='$session_id' ");


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



	//// update data kendaraan
	function update_kendaraan($session_id, $no_polisi, $no_stnk)  
	{

		// entry data ke tabel kendaraan
		$this->db->query("update kendaraan set 
								no_polisi='$no_polisi',
								no_stnk='$no_stnk'

								where 
								id='$session_id' ");

		}


	//// insert data kendaraan
	function insert_kendaraan($session_id, $no_polisi, $no_stnk) 
	{ 
		
		// entry data ke tabel kendaraan
		$this->db->query("insert into kendaraan(id, no_polisi, no_stnk) 
							values 
							('$session_id','$no_polisi','$no_stnk') ");


		}



	// ketemu 1 atau tidak
	function cek_kendaraan($session_id) {
		$r = $this->db->query("select count(id) as id from kendaraan where id='$session_id' ");

		return $r->row();
	}



	// ketemu 1 atau tidak
	function cek_foto($session_id) {
		$r = $this->db->query("select count(id) as id from foto where id='$session_id' ");

		return $r->row();
	}


	//// update data foto
	function update_foto($session_id, $nama_file)  
	{

		// entry data 
		$this->db->query("update foto set 
								file_foto='$nama_file'
								where 
								id='$session_id' ");

		}


	//// insert data foto
	function insert_foto($session_id, $nama_file) 
	{ 
		
		// entry data ke tabel foto
		$this->db->query("insert into foto(id, file_foto) 
							values 
							('$session_id', '$nama_file') ");

		}






	// list member
	function list_member() {
		$r = $this->db->query("select a.nama, a.`tgl_daftar`, b.file_foto
								from registrasi a
								left join foto b
								on a.id = b.id
								");

		return $r;
	}	


}