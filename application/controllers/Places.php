<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Places extends CI_Controller {

	public function index()
	{
		$this->load->library('unit_test');
		$this->load->model('model_regions');
		$this->load->model('model_places');
		$this->load->library('session');
		$username = $this->session->userdata('username');
		
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
		
		$this->lang->load("slideshow", $lang);
		$this->lang->load("nav", $lang);
		$this->lang->load("places", $lang);
		
		
		$this->session->set_userdata("lang", $lang);
		
		if($wasPostLang === true){
			
			$curUrl = base_url(uri_string());
			
			redirect($curUrl);
			
		}
		
		/*
		* END of language handling
		*/
		
		//gets description of every region and saves it into db
		if(isset($_POST['regionSubmit']))
		{
						
			for($i=1; $i<7; $i++){
				
				$arej = array(
					'regionDescription' => $_POST['desc' . $i]
				);
				
				$this->db->where('idRegions', $i);
				$this->db->update("Regions", $arej);
			}
		}
		
	
		//set region's description from database
		$region = $this->model_regions->get();
		$this->unit->run($region, 'is_array', "region_isArray");
		foreach ($region as $r){
			$data[$r->regionName] = $r->regionDescription;
		}
		
		//stores all place names from db into data
		$place = $this->model_places->get();
		$this->unit->run($place, 'is_array', "place_isArray");
		foreach($place as $p){
			if(!isset($data["r" . $p->Regions_idRegions])){
				$data["r" . $p->Regions_idRegions] = "<li>".$p->placeName."</li>";
			}
			else{
				$data["r" . $p->Regions_idRegions] .= "<li>".$p->placeName."</li>";
			}
		}
		
		
		$data['regions'] = $this->load->view('placesUser', $data, TRUE);
		
		//checks for user: basic user or admin
		if($username){
			
			$data['loginHTML'] = "<li><a href=\"logout\">" . lang("logout") . "</a></li>";
			
			$data['user'] = "<li>" . lang("hi") . ", <a href=\"profile\">" . $username . "</a></li>";
			
			$userType = $this->db->get_where('Users', array('username' => $username))->result();
			$this->unit->run($this->db, 'is_object', "this->db_isObject");
			$this->unit->run($userType, 'is_array', "userType_isArray");
			$userType = $userType[0]->type;
			
			if($userType == "1") // is admin
			{
				$data['regions'] = $this->load->view('placesAdmin', $data, TRUE);
				
			}
		
		}else{
			
			$data['loginHTML'] = "<li><a href=\"login\">" . lang("login") . "</a></li>";
			
			$data['user'] = "";
			
		}
		

		//loads only nav bar and footer
		$data['nav'] = $this->load->view('navBar', $data, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		
		
		//loads the body of places
		$this->load->view("places", $data);
		//echo $this->unit->report();

	}
	
	
}