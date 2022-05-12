<?php
class Logout extends Controller
{
	public function __construct() {
		if ($this->userModel == null) {
			$this->userModel = $this->model('User');
		}
	}

	/**
	 * Views home page
	 *
	 * @return void
	 */
	public function index()
	{
		$this->view('users/home');
	}

	/**
	 * delete session and cookie
	 *
	 * @return void
	 */
    public function executeLogout() {
		setcookie('user', '', time() - (60*60*24*30));
		unset($_COOKIE['user']);
		session_destroy();
		header('location: ../home');
    }
}
