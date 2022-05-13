<?php
class Logout extends Controller
{
	/**
	 * Views home page
	 *
	 * @return void
	 */
	public function index() {
		$this->view('users/home');
	}

	/**
	 * Delete session and cookie
	 *
	 * @return void
	 */
    public function executeLogout() {
		setcookie('user', null, -1, '/');
		unset($_COOKIE['user']);
		session_destroy();
		header('location: ../home');
    }
}
