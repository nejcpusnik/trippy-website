<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trippy extends CI_Controller {

	public function index()
	{
		$this->load->library('unit_test');
		$this->load->library('session');
		
		$username = $this->session->userdata('username');
		$this->unit->run($username, 'is_string');
		/*
		* language handling
		*/		
		$lang = html_escape($this->input->post('lang'));
		
		$data["lang_english"] = "";
		$data["lang_slovenian"] = "";
		
		$wasPostLang = false;
		
		if($lang){
			
			if($lang == "english" || $lang == "slovenian"){
				
				$data["lang_" . $lang] = " langChosen";
				
				$wasPostLang = true;
				
			}
			
		}elseif($this->session->userdata('lang') !== NULL){
			
			$lang = $this->session->userdata('lang');
			
			$data["lang_" . $lang] = " langChosen";
			
		}else{
			
			$lang = $this->config->item("language"); // get default language from config.php
			
			$data["lang_" . $lang] = " langChosen";
			
		}
		
		$this->load->helper("language");
		
		$this->lang->load("nav", $lang);
		$this->lang->load("index", $lang);
		
		
		$this->session->set_userdata("lang", $lang);
		
		if($wasPostLang === true){
			
			$curUrl = base_url(uri_string());
			
			redirect($curUrl);
			
		}
		
		
		/*
		* END of language handling
		*/
		
		//sets logout button and username for nav bar if username set
		if($username){

			$data['loginHTML'] = "<li><a href=\"logout\">" . lang("logout") . "</a></li>";
			
			$data['user'] = "<li>" . lang("hi") . ", <a href=\"profile\">" . $username . "</a></li>";
		
		}else{
			
			$data['loginHTML'] = "<li><a href=\"login\">" . lang("login") . "</a></li>";
			
			$data['user'] = "";
			
		}
		
		
		
		//loads only nav bar and footer
		$data['nav'] = $this->load->view('navBar', $data, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		
		
		//loads the body
		$this->load->view("index", $data);
		//echo $this->unit->report();
		
	}

}