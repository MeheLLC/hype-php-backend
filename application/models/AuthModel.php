<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	// Return true/false depending on if the user actually exist
	private function verifyUser($username, $password) {
		if(empty($username) || empty($password)) return false;
		
		// Hash the users password
		$hashedPassword = hash('sha256', $password);
		
		$this->db->select('auth_user_id');
		$this->db->where('auth_user_username', $userData);
		$this->db->where('auth_user_password', $hashedPassword);
		
		$query = $this->db->get('hype_auth');
		
		$recordCount = $query->num_rows();
		
		if($recordCount == 1) {
			return true;
		}
		
		return false;
	}
	
	public function registerUser($email, $password, $name, $phone, $username) {
		if(empty($email) || empty($password) || empty($name) || empty($phone) || empty($username)) return false;
			
		// Create the hashed password 
		$hashedPassword = hash('sha256', $password);
		
		// Build our user array
		$userData = array(
			'auth_user_email' 		=> $email,
			'auth_user_name' 		=> $name,
			'auth_user_phone' 		=> $phone,
			'auth_user_username' 	=> $username,
			'auth_user_password' 	=> $hashedPassword
		);
		
		// Prepare to insert the data into the auth table
		$result = $this->db->insert('hype_auth', $userData);
		
		return $result;
	}
}
