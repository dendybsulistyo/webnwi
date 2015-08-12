<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class member extends CI_Controller {

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
	public function index()
	{
		$this->load->view('welcome_member');
	
	} // akhir index

	public function login() 
	{
		$this->load->view('welcome_login');
	
	} // akhir login


	public function list_member() 
	{

		// load model untuk member
		$this->load->model('mmember');
		$data['r'] = $this->mmember->list_member();

		$this->load->view('list_member', $data);
	
	} // akhir list_member


	public function auth()
	{
		// variabel input form login 	
		$email 		= $this->input->post('email');
		$password 	= md5($this->input->post('password'));

		// load model untuk member
		$this->load->model('mmember');

		$r 				= $this->mmember->cek_auth($email, $password);
		
		// data untuk disimpan ke session
		$id 			= $r->id;
		$nama 			= $r->nama;
		$data['jemail'] = $r->jemail;

		// ketemu 1
		if($data['jemail']==1) {

						// simpan data ke session
						$newdata = array(
						'id'			=> "$id",	
 						'nama'  		=> "$nama",
                   		'email'  		=> "$email",
			            'password'  	=> "$password"
				        );

						// seting session
						$this->session->set_userdata($newdata);

						// data variable
						$session_id			 	= $this->session->userdata('id');
						$data['session_id'] 	= $this->session->userdata('id');
						$data['session_nama'] 	= $this->session->userdata('nama');
						$data['session_email'] 	= $this->session->userdata('email');


						// load model untuk member
						$this->load->model('mmember');
						$r 	= $this->mmember->dashboard_member($session_id);
						
						if(!$r) {
							
						}
						else {

								// simpan data ke array
								$data = array(
								'id' 				=> "$r->id",
								'session_nama'		=> $this->session->userdata('nama'),
								'panggilan'  		=> "$r->panggilan",
								'tmp_lahir'  		=> "$r->tmp_lahir",
								'tgl_lahir'  		=> "$r->tgl_lahir",
								'gol_darah'  		=> "$r->gol_darah",
								'jenis_kelamin'  	=> "$r->jenis_kelamin",
								'alamat' 			=> "$r->alamat",
								'kode_pos' 			=> "$r->kode_pos",
								'telpon' 			=> "$r->telpon",
								'no_hp' 			=> "$r->no_hp",
								'pekerjaan' 		=> "$r->pekerjaan",
								'gabung' 			=> "$r->gabung"
						        );

						}
						
 						
						//$data['id'] 			= $r->id;
						//$data['panggilan']  	= $r->panggilan;
						//$data['tmp_lahir']  	= $r->tmp_lahir;
						//$data['tgl_lahir']  	= $r->tgl_lahir;
						//$data['gol_darah']  	= $r->gol_darah;
						//$data['jenis_kelamin']  = $r->jenis_kelamin;
						//$data['alamat'] 		= $r->alamat;
						//$data['kode_pos'] 		= $r->kode_pos;
						//$data['telpon'] 		= $r->telpon;
						//$data['no_hp'] 			= $r->no_hp;
						//$data['pekerjaan'] 		= $r->pekerjaan;
						//$data['gabung'] 		= $r->gabung;


						// load view dashboard member
						$this->load->view('dashboard_member', $data);

		} // akhir if ketemu 1

		// jika jemail !== 1

					else {

						// redirect ke halaman login 
						redirect('member/login','refresh');

		} // akhir if jika tidak ketemu 1


	} // akhir auth

	public function dashboard_home()
	{
		
						// data variable
						$session_id			 	= $this->session->userdata('id');

						// data session
						$data['session_id'] 	= $this->session->userdata('id');
						$data['session_nama'] 	= $this->session->userdata('nama');
						$data['session_email'] 	= $this->session->userdata('email');

						// load model untuk member
						$this->load->model('mmember');
						$r 	= $this->mmember->dashboard_member($session_id);

						if(!$r) {
							
						}
						else {

							// simpan data ke array
								$data = array(
								'id' 				=> "$r->id",
								'session_nama'		=> $this->session->userdata('nama'),
								'panggilan'  		=> "$r->panggilan",
								'tmp_lahir'  		=> "$r->tmp_lahir",
								'tgl_lahir'  		=> "$r->tgl_lahir",
								'gol_darah'  		=> "$r->gol_darah",
								'jenis_kelamin'  	=> "$r->jenis_kelamin",
								'alamat' 			=> "$r->alamat",
								'kode_pos' 			=> "$r->kode_pos",
								'telpon' 			=> "$r->telpon",
								'no_hp' 			=> "$r->no_hp",
								'pekerjaan' 		=> "$r->pekerjaan",
								'gabung' 			=> "$r->gabung"
						        );

						}	


						// load view dashboard member
						$this->load->view('dashboard_member', $data);


	} // akhir personal

	public function personal()
	{
		
						// retrieve session
						$session_id			 	= $this->session->userdata('id');
						

						$data['session_id'] 	= $this->session->userdata('id');
						$data['session_nama'] 	= $this->session->userdata('nama');
						$session_nama		 	= $this->session->userdata('nama');
						$data['session_email'] 	= $this->session->userdata('email');


						// load model untuk member
						$this->load->model('mmember');
						$r 	= $this->mmember->dashboard_member($session_id);

						if(!$r) {
							
						}
						else {

								// simpan data ke array
								$data = array(
								'id' 				=> "$r->id",
								'session_nama'		=> $this->session->userdata('nama'),
								'panggilan'  		=> "$r->panggilan",
								'tmp_lahir'  		=> "$r->tmp_lahir",
								'tgl_lahir'  		=> "$r->tgl_lahir",
								'gol_darah'  		=> "$r->gol_darah",
								'jenis_kelamin'  	=> "$r->jenis_kelamin",
								'alamat' 			=> "$r->alamat",
								'kode_pos' 			=> "$r->kode_pos",
								'telpon' 			=> "$r->telpon",
								'no_hp' 			=> "$r->no_hp",
								'pekerjaan' 		=> "$r->pekerjaan",
								'gabung' 			=> "$r->gabung"
						        );

						}	

						// load view dashboard member
						$this->load->view('dashboard_personal', $data);


	} // akhir personal


	public function update_personal()
	{
			// variabel entri
			$data['session_id'] 	= $this->session->userdata('id');
			$session_id 			= $this->session->userdata('id');
			$nama 					= $this->input->post('nama');
			$panggilan 				= $this->input->post('panggilan');
			$tmp_lahir 				= $this->input->post('tmp_lahir');
			$tgl_lahir 				= $this->input->post('tgl_lahir');
			$gol_darah 				= $this->input->post('gol_darah');
			$jenis_kelamin 			= $this->input->post('jenis_kelamin');
			$alamat 				= $this->input->post('alamat');
			$kode_pos 				= $this->input->post('kode_pos');
			$telpon 				= $this->input->post('telpon');
			$no_hp 					= $this->input->post('no_hp');
			$pekerjaan 				= $this->input->post('pekerjaan');
			$gabung 				= $this->input->post('gabung');

			// load tabel
			$this->load->model('mmember');

			// cek sudah ada belum 
			$r = $this->mmember->cek_member($session_id);

			if($r->id=="1") {

				// update ke tabel member
				$this->mmember->update_personal($session_id,  $nama, $panggilan, $tmp_lahir, $tgl_lahir, 
								$gol_darah, $jenis_kelamin, $alamat, $kode_pos, $telpon, $no_hp, $pekerjaan, $gabung);
			}
			else {

				// insert ke tabel member
				$this->mmember->insert_personal($session_id,  $nama, $panggilan, $tmp_lahir, $tgl_lahir, 
								$gol_darah, $jenis_kelamin, $alamat, $kode_pos, $telpon, $no_hp, $pekerjaan, $gabung);
						
			}

				$this->session->set_flashdata('member', 'sukses');

			// redirect ke halaman dashboard personal 
			redirect('member/personal','refresh');



	} // akhir update_personal




	public function kendaraan()
	{
		
						// retrieve session
						$data['session_nama'] 	= $this->session->userdata('nama');
						$data['session_email'] 	= $this->session->userdata('email');

						// load view dashboard member
						$this->load->view('dashboard_kendaraan', $data);


	} // akhir kendaraan





	public function logout() 
	{

		// removing session
		$this->session->unset_userdata('newdata');
		redirect('member/login','refresh');
	
	} // akhir logout



}
