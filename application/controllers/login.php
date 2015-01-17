<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('header');
		$this->load->view('login/inicio');
		$this->load->view('footer');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */
