<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {
	
	//unsets session and redirects to home page
	public function index()
	{
		$this->load->library('session');
		$this->session->unset_userdata('username');
		redirect('');
	}
	
}