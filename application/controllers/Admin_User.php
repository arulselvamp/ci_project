<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_User extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Users_Model');
		/* Load the libraries and helpers */
		$this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper(array('form', 'url','cookie'));
	}

	public function index(){		
		$this->load->library('session');
		$this->load->view('admin_login');
	}

	public function login(){
		//load session library
		$this->load->library('session');
		//$this->load->library('cookie');

		$a_username = $_POST['a_username'];
		$a_password = $_POST['a_password'];

		$data = $this->Users_Model->admin_login($a_username, $a_password);

		if($data){				
			
			// remember me
		                    if(!empty($this->input->post("remember1"))) {		                    	
			                 setcookie ("loginId1", $a_username, time()+ (10 * 365 * 24 * 60 * 60),"/");
			                 setcookie ("loginPass1",$a_password, time()+ (10 * 365 * 24 * 60 * 60),"/");
		                    } else {
			                    setcookie ("loginId1",""); 
			                    setcookie ("loginPass1","");
		                    }
	            
				$this->session->set_userdata('admin_user', $data);

	            $this->load->view('admin/admin_home');

		}
		else{
			// header('location:'.base_url().$this->index());
			header("location:".base_url()."Admin_User");
			$this->session->set_flashdata('error','Invalid login. User not found');
		}
	}

	public function logout(){

		$this->session->sess_destroy();
		redirect("/");
	}

	

}
