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
		if (isset($_COOKIE['user'])){
			setcookie('user', '', time() - (60*60*24*30));
		}
		header('location: ./home');
    }
}
