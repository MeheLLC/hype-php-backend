<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model {
	
	public function __construct() {
		parent::__construct();
	}
	
	// Return true/false depending on if the user actually exist
	private function checkUserCredentials($email, $password) {
		
	}
}
