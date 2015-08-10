<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class registrasi extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function daftar()
	{
		$this->load->view('welcome_daftar');
	
	} // akhir function form pendaftaran


	public function baru()
	{
		// entry variabel pendaftaran	
		$nama 		= $this->input->post('nama');
		$email 		= $this->input->post('email');
		$password 	= md5($this->input->post('password'));

		// kode nwi harus sesuai dengan yang ada di tabel
		$kode_nwi 	= $this->input->post('kode_nwi');

		// load tabel
		$this->load->model('mregistrasi');
		
		// cek kode verifikasi dulu, ambil dari tabel
		$r = $this->mregistrasi->cek_kode($kode_nwi);
		$jkode = $r->jkode;

			// jika kode cocok
			if($jkode==1) {

			// insert ke tabel registrasi
			$this->mregistrasi->insert_registrasi($nama, $email, $password);

			// load view untuk konfirmasi pendaftaran telah berhasil
			$this->session->set_flashdata('registrasi', 'sukses');
			
				// email ke pendaftar	
				//$this->load->view('class.phpmailer');
				
				//require_once("class.phpmailer.php");
				
				//$mail             = new PHPMailer(); // defaults to using php "mail()"

				//$body             = "<h3>Salam Auuuu...</h3> <br>
                //                                Calon Member Naked Wolves Indonesia <br>
				//		Akun di nwi5jogja.net milik anda adalah <br><br>

				//					Nama Lengkap : $nama<br>
				//					Email : $email<Br>
				//					Password Registrasi : ************<br><br><br>

				//					Simpan baik baik informasi ini. Terima Kasih<br><br>
				//					NWI Chapter Yogyakarta";

				//$mail->AddReplyTo("$email","Pendaftaran Akun Member");
				//$mail->SetFrom('norepy@nwi5jogja.net', 'NWI-5 Yogya');
				//$mail->AddReplyTo("norepy@nwi5jogja.net","Pendaftaran Akun Member");
				//$address = "$email";
				//$mail->AddAddress($address, "NWI 5 Yogya");
				//$mail->Subject    = "Akun NWI-5 Jogja";
				//$mail->AltBody    = "Gunakan browser/pembaca email yang kompatibel ya ndes "; 
                                
                // optional, comment out and test
				//$mail->MsgHTML($body);

				//if(!$mail->Send()) {
				//echo $mail->ErrorInfo;
				//} else {
				//  echo "Konfirmasi Pendaftaran sudah terkirim !";
				//}

				/// akhir script untuk kirim email 

			}

			// jika kode tidak cocok
			else {
			$this->session->set_flashdata('registrasi', 'gagal');
			
			}

			// redirect ke halaman pendaftaran
			redirect('registrasi/daftar','refresh');

	
	} // akhir pendaftaran baru

}
