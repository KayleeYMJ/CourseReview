<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	public function index() {
		$data['current_page']= "log_in";
		$this->load->view('header', $data); 
		$data['error']= ""; // mismatch user name & password
		$this->load->helper('form');
		$this->load->helper('url');
	
        if (!$this->session->userdata('logged_in')) {	//check if user already login
			if (get_cookie('remember')) { // check if user activate the "remember me" feature  
				$username = get_cookie('username'); //get the username from cookie
				$password = get_cookie('password'); //get the password from cookie
				$this->load->view('login',$data);
		    }else{ //if user already logined show main page
				$this->load->view('login', $data);	
			}
		}
	}

	public function check_login() {
		$this->load->model('user_model');//load user model
		$data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or passwrod!! </div> ";// error message
		$this->load->helper('form');
		$this->load->helper('url');
		$username = $this->input->post('username'); //getting username from login form
		$password = $this->input->post('password'); //getting password from login form
		if(!$this->session->userdata('logged_in')){	//Check if user already login
			$hash_password = $this->user_model->login($username);
		    if (count($hash_password) != 0 ){
			    if ($password == $hash_password[0]['password']){ //check username and password
				    $user_data = array(
					    'username' => $username,
					    'logged_in' => true 	//create session variable
				    );
				    $this->session->set_userdata($user_data); //set user status to login in session
				    $data['current_page']= "home";
				    $this->load->view('header', $data); 
				    $this->load->view('home', $data);
				    //redirect('home'); // direct user home page
			    }else{
					$data['current_page']= "log_in";
					$this->load->view('header', $data); 
					$this->load->view('login', $data);	//if username password incorrect, show error msg and ask user to login
				}
			}else{
				$data['current_page']= "log_in";
				$this->load->view('header', $data); 
				$this->load->view('login', $data);	//if username password incorrect, show error msg and ask user to login
			}
		}else{
			$data['current_page']= "home";
			$this->load->view('header', $data);
		    $this->load->view('home', $data);
			//redirect('home'); //if user already logined direct user to home page
		}
	}

	public function logout(){   
		$data['current_page']= "log_in";
		$data['error']='';
        $this->session->unset_userdata('logged_in'); //delete login status
		$this->load->view('header', $data);
		$this->load->view('home', $data);
		//redirect('login', $data); // redirect user back to login
	}

}
?>
