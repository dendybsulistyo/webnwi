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
	}

	public function login() 
	{
		$this->load->view('welcome_login');
	}

	public function auth()
	{
		// variabel input form login 	
		$email 		= $this->input->post('email');
		$password 	= md5($this->input->post('password'));

		// todo
		// ketemu 1 atau tidak
		// kalau ketemu, session disimpan dan ditampilkan nama nya
		// kalau tidak redirect lagi ke halaman login sambil kasih flash message


		// simpan data ke session
		$newdata = array(
                   'email'  => "$email",
                   'password'  => "$password",
                   'logged_in' => TRUE
               );

		// seting session
		$this->session->set_userdata($newdata);

		// retrieve session
		$data['session_email'] = $this->session->userdata('email');

		// load view dashboard member
		$this->load->view('dashboard_member', $data);

	}

	public function logout() 
	{

		// removing session
		$this->session->unset_userdata('newdata');
		redirect('member/login','refresh');
	}



}
