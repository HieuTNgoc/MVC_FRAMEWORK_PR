<?php
class Logout extends Controller
{
	public function __construct() {
		$this->userModel = $this->model('User');
	}

    public function logout() {
        $data = [
			'title' => 'Home - Base Account'
		];
		unset($_SESSION['user_id']);
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		header('location: ./login');
    }
}
