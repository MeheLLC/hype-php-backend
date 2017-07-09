<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthController extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		
		$this->load->model('AuthModel');
	}
	
	public function signIn() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		// Check to make sure the contents are not empty
		
		if(empty($username) || empty($password)) {
			return false;
		}
		
		$hashedPassword = hash('sha256', $password);
		
		$status = $this->AuthModel->verifyUser($username, $password);
		
		if(!$status) {
			return json_encode(array('status' => $status));
		} else {
			return json_encode($status);
		}
	}
	
	public function signUp() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$confirmedPassword = $this->input->post('confirmed_password');
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		$phone = $this->input->post('phone');
		
	}
}
