<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	// Index page for magazine controller
	public function index()
	{
		$this->toLogin();
	}

	public function toLogin(){
		$this->load->library('unit_test');
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('model_users');
		$this->load->helper('email');
		$data['errorState'] = "none";
		$data['errorStateReg'] = "none";
		$username = $this->session->userdata('username');
		$this->unit->run($data, 'is_array', "data_isArray");
		$this->unit->run($username, 'is_null', "username_isNull");
		
		if($username){ // if user already logged in -> redirect to index
			
			redirect('http://ezoarhiv.si/site/');
			
		}
		
		
		/*
		* language handling
		*/		
		$lang = html_escape($this->input->post('lang'));
		$this->unit->run($lang, 'is_null', "lang_isNull");
		$data["lang_english"] = "";
		$data["lang_slovenian"] = "";
		
		$wasPostLang = false;
		
		if($lang){
			$this->unit->run($lang, 'is_string');
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
		$this->lang->load("login", $lang);
		
		$this->session->set_userdata("lang", $lang);
		
		if($wasPostLang === true){
			
			$curUrl = base_url(uri_string());
			
			redirect($curUrl);
			
		}
		
		
		/*
		* END of language handling
		*/
		if($username){
			$data['loginHTML'] = "<li><a href=\"logout\">" . lang("logout") . "</a></li>";
			
			$data['user'] = "<li>" . lang("hi") . ", <a href=\"profile\">" . $username . "</a></li>";
		
		}else{
			
			$data['loginHTML'] = "<li><a href=\"login\">" . lang("login") . "</a></li>";
			
			$data['user'] = "";
			
		}
		
		
		//REGISTRATION FORM HANDLING
		if(isset($_POST['reg_username']))
		{
			$user = $this->model_users->get();
			
			$hashedPw = hash('sha256', $_POST['password1'] . SALT);
			$username = $this->input->post('reg_username');
			$email = $this->input->post('mail');
			$pass1 =  $this->input->post('password1');
			$pass2 =  $this->input->post('password2');

			
			//password match validation
			if ($pass1 != $pass2){
				$data['errorStateReg'] = "block";
				$data['errorMsg'] = lang("newErrorMatch");
				
			}
			//email validation
			else if(valid_email($email) == FALSE){
				$data['errorStateReg'] = "block";
				$data['errorMsg'] = lang("newErrorEmail");
			}
			else{
				//checks if user does not exist in DB and creates a new one
				if(!$this->checkDB($user, $username, $email)){
					
					$new_user = new Model_users();
					$new_user->email = $email;
					$new_user->username = $username;
					$new_user->password = $hashedPw;
					$new_user->type = '0';
					$new_user->save();
					redirect('login/success');
				}
				else if ($this->checkDB($user, $username, $email) == "1")
				{
					$data['errorStateReg'] = "block";
					$data['errorMsg'] = lang("newErrorUserExists");
				}
				else if ($this->checkDB($user, $username, $email) == "2")
				{
					$data['errorStateReg'] = "block";
					$data['errorMsg'] = lang("newErrorUserTaken");
				}
				else if ($this->checkDB($user, $username, $email) == "3")
				{
					$data['errorStateReg'] = "block";
					$data['errorMsg'] = lang("newErrorEmailTaken");
				}
			}
		}
		
		
		
		
		
		
		//LOGIN FORM HANDLING
		if(isset($_POST['username']) && isset($_POST['password'])){
			
			$passHash = hash('sha256', $_POST['password'] . SALT);
			$username = $_POST['username'];
			$password = $_POST['password'];
			$user = $this->model_users->get();
			
			$success = false;
			
			//username/email and password authentication
			foreach($user as $u){
				if($u->username == $username || $u->email == $username){
					$username = $u->username;
					if($u->password == $passHash){
						$success = true;
						break;
					}
					break;
				}
			}
			
			if(!$success){
				
				$data['nav'] = $this->load->view('navBar', $data, TRUE);
				$data['errorState'] = "block";
				$data['footer'] = $this->load->view('footer', NULL, TRUE);
				
				$this->lang->load("nav", $lang);
				$this->lang->load("login", $lang);
				
				$this->load->view('login', $data);
				
			}else{
				
				$this->session->set_userdata("username", $username);
				redirect('');
			}
		}else{	//user has not logged in yet
			
			$data['nav'] = $this->load->view('navBar', $data, TRUE);
			
			$data['footer'] = $this->load->view('footer', NULL, TRUE);
			
			
			$this->load->view('login', $data);	
			//echo $this->unit->report();
		}
	}
	
	/*
	returns 1 if user already in DB, returns 2 if username already taken
	and returns 3 if email address already in database
	*/
	public function checkDB($user, $username, $email)
	{
		foreach($user as $u){
			if($u->username == $username && $u->email == $email){
				return "1";
			}
			else if($u->username == $username){
				return "2";
			}
			else if($u->email == $email){
				return "3";
			}
		}
		return false;
	}
	
	//language handling for sucess page
	public function success(){
		
		$this->load->library('session');
		
		if($this->session->userdata('lang') !== NULL){
			
			$lang = $this->session->userdata('lang');
			
			
			
		}else{
			
			$lang = $this->config->item("language"); // get default language from config.php
			
			
		}
		
		$this->load->helper("language");
		
		$this->lang->load("success", $lang);
		
		$this->session->set_userdata("lang", $lang);
		
		
		$this->load->view('success');
	}
	
	//language handling for forgot password page
	public function forgotpw(){
		
		$this->load->library('session');
		
		if($this->session->userdata('lang') !== NULL){
			
			$lang = $this->session->userdata('lang');
			
			
			
		}else{
			
			$lang = $this->config->item("language"); // get default language from config.php
			
			
		}
		
		$this->load->helper("language");
		
		$this->lang->load("forgot", $lang);
		
		$this->session->set_userdata("lang", $lang);
		
		$data["lang"] = $lang;
		
		$this->load->view('forgotpw', $data);
	}
	
}