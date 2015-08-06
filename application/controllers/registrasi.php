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
	}

	public function baru()
	{
		$user_name 	= $this->input->post('user_name');
		$email 		= $this->input->post('email');
		$password 	= $this->input->post('password');
		$kode_nwi 	= $this->input->post('kode_nwi');
		

		$this->load->view('welcome_daftar');

	}

}
