<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function index()
	{
		$this->load->library('unit_test');
		$this->load->library('session');
		$this->load->model('model_users');
		$username = $this->session->userdata('username');
		$this->unit->run($username, 'is_string');
		$data['username'] = $username;
		$email = $this->db->get_where('Users', array('username' => $username))->result();
		$data['email'] = $email[0]->email;
		$this->unit->run($email, 'is_array');
		$this->unit->run($email[0]->email, 'is_string');
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
		$this->lang->load("profile", $lang);
		
		$this->session->set_userdata("lang", $lang);
		
		if($wasPostLang === true){
			
			$curUrl = base_url(uri_string());
			
			redirect($curUrl);
			
		}
		
		/*
		* END of language handling
		*/
		
		
        $user = $this->db->get_where('Users', array('username' => $username))->result();
        $userPw = $user[0]->password;
        $userid =$user[0]->idUsers;
		$data['errorState'] = "none";
		
		//checks if user changed password
        if(isset($_POST['pass1'])){
            $pass1 = hash('sha256', $_POST['pass1'] . SALT);
			
			//password validation
            if($pass1 == $userPw){   //old password match
				
                if($_POST['pass2'] == $_POST['pass3']){     //new password retype match
                    $newpass = hash('sha256', $_POST['pass2'] . SALT);
					
					//stores new password into array
                    $updateuser = array(
                        'password' => $newpass
                    );
					
					//updates database with new password
                    $this->db->where('idUsers', $userid);
                    $this->db->update('Users', $updateuser);
					$data['errorState'] = "block";
					$data['errorMsg'] = "New password has been set!";
                }
				//error handling
                else{
					$data['errorState'] = "block";
					$data['errorMsg'] = "Passwords do not match!";
                }
            }
			else{
				$data['errorState'] = "block";
				$data['errorMsg'] = "Old password is incorrect!";
			}
        }

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
		$this->load->view("profile", $data);
		//echo $this->unit->report();
	}
}