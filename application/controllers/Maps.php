<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maps extends CI_Controller {
	
	
	public function index()
	{
		$this->load->library('unit_test');
		$this->load->model('Model_places');
		$this->load->library('session');
		$username = $this->session->userdata('username');
		$this->unit->run($username, 'is_string', "username_isString");
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
		$this->lang->load("maps", $lang);
		
		$this->session->set_userdata("lang", $lang);
		
		if($wasPostLang === true){
			
			$curUrl = base_url(uri_string());
			
			redirect($curUrl);
			
		}
		
		/*
		* END of language handling
		*/
		
		
		//for admin: adds new place to the database
		if(isset($_POST['newplace'])){
			$newPlace = $_POST['newplace'];
			if(isset($newPlace) && !$this->saveNewPlace($newPlace)){
				$googleName = $_POST['newplace'].", Slovenia";
				$regionId = $this->regionNumber($_POST['newregion']);
				
				$new_place = new Model_places();
				$new_place->placeName = $_POST['newplace'];
				$new_place->googleName = $googleName;
				$new_place->Regions_idRegions = $regionId;
				$new_place->save();
				//echo $this->unit->run($new_place, 'is_object', "new_place_isObject");

			}
		}
		//deletes places from db
		else if(isset($_POST['oldplace']) && !isset($_POST['newplace'])){
			$oldplace = $_POST['oldplace'];
			$oldplace = rtrim($oldplace, ",");
			$placeId = $this->getPlaceId($oldplace);
			$place = new Model_places();
			$place->idPlaces = $placeId;
			$place->delete();
			//echo $this->unit->run($place, 'is_object', "place_isObject");
		}
		
		
		
		
		
		
		//reads all stops from db and display them
		$data['stops'] = $this->readStops();
		$data['selectBox'] = $this->load->view('slctBoxNonUser', $data, TRUE);
		$data['hide'] = "";
		$data['msg'] = lang("guestInstruction");
		//enables select box for logged users
		if($username){
			
			$data['loginHTML'] = "<li><a href=\"logout\">" . lang("logout") . "</a></li>";
			
			$data['user'] = "<li>" . lang("hi") . ", <a href=\"profile\">" . $username . "</a></li>";
			$data['msg'] = lang("userInstruction");
			
			$userType = $this->readType($username);
						
			$data['selectBox'] = $this->load->view('slctBoxUser', $data, TRUE);
			
			//shows select box for admin
			if($userType == "1") // is admin
			{
				$data['hide'] = "none";
				$data['selectBox'] = $this->load->view('slctBoxAdmin', $data, TRUE);
				
				
			}
			
		}else{
			
			$data['loginHTML'] = "<li><a href=\"login\">" . lang("login") . "</a></li>";
			
			$data['user'] = "";
			
		}
		
		//loads only nav bar and footer
		$data['nav'] = $this->load->view('navBar', $data, TRUE);
		$data['footer'] = $this->load->view('footer', NULL, TRUE);
		
		
		//loads the body of the page
		$this->load->view("maps", $data);
		//echo $this->unit->report();
	}	
	
	
	
	
	
	//reads all stops from "places" table and orders them in select options
	public function readStops(){
		$this->load->model('model_places');
		$stops = $this->model_places->get();
		$this->unit->run($stops, 'is_array', "stops_isArray");
		
		foreach($stops as $s){
			if(!isset($data["stops"])){
				$data['stops'] = "<option value=".$s->googleName.">" . $s->placeName ."</option>";
			}
			else{
				$data['stops'] .= "<option value=".$s->googleName.">" . $s->placeName ."</option>";
			}
		}
		return $data['stops'];
		
	}
	
	
	
	
	//returns type of the user: 0 for users, 1 for admin
	public function readType($username){
		$userType = $this->db->get_where('Users', array('username' => $username))->result();
		$userType = $userType[0]->type;
		return $userType;
	}
	
	
	
	
	
	//checks place already in db: returns true if it is
	public function saveNewPlace($newPlace){
		$this->load->model('model_places');
		$places = $this->model_places->get();
		
		foreach($places as $p){
			if($p->placeName == $newPlace){
				return TRUE;
			}
		}
		return FALSE;		
	}
	
	//returns region's id
	public function regionNumber($region){
		$regionId = $this->db->get_where('Regions', array('regionName' => $region))->result();
		$regionId = $regionId[0]->idRegions;
		return $regionId;
	}
	
	//returns place's id
	public function getPlaceId($placename){
		$placeId = $this->db->get_where('Places', array('placeName' => $placename))->result();
		$placeId = $placeId[0]->idPlaces;
		return $placeId;
	}
}