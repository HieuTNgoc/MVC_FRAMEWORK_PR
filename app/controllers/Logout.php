<?php
class Logout extends Controller
{
	public function __construct() {
		
	}

    public function logout() {
        $data = [
			'title' => 'Home - Base Account'
		];
		// unset($_SESSION['user_id']);
		// unset($_SESSION['username']);
		// unset($_SESSION['email']);
		session_destroy();
		header('location: ./home');
    }
}
