<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('funkcija'))
{
    function funkcija()
    {
        $this->load->library('session');
		
		$username = $this->session->userdata('username');
    } 
}