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


	public function auth()
	{
		// variabel input form login 	
		$email 		= $this->input->post('email');
		$password 	= md5($this->input->post('password'));

		// load model untuk member
		$this->load->model('mmember');

		$r 				= $this->mmember->cek_auth($email, $password);
		
		// data untuk disimpan ke session
		$nama 			= $r->nama;
		$data['jemail'] = $r->jemail;

		// ketemu 1
		if($data['jemail']==1) {

						// simpan data ke session
						$newdata = array(
 						'nama'  		=> "$nama",
                   		'email'  		=> "$email",
			            'password'  	=> "$password",
	                    'logged_in' 	=> TRUE
				        );

						// seting session
						$this->session->set_userdata($newdata);

						// retrieve session
						$data['session_nama'] 	= $this->session->userdata('nama');
						$data['session_email'] 	= $this->session->userdata('email');

						// load view dashboard member
						$this->load->view('dashboard_member', $data);

		} // akhir if ketemu 1

		// jika jemail !== 1

					else {

						// redirect ke halaman login 
						redirect('member/login','refresh');

		} // akhir if jika tidak ketemu 1


	} // akhir auth

	public function logout() 
	{

		// removing session
		$this->session->unset_userdata('newdata');
		redirect('member/login','refresh');
	
	} // akhir logout



}
