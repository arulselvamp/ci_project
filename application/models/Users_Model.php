<?php
	class Users_Model extends CI_Model {
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		
		public function admin_login($username, $password){
			$query = $this->db->get_where('admin_users', array('username'=>$username, 'password'=>$password));
			return $query->row_array();
		}
		
	}
?>
