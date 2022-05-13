<?php
class Home extends Controller {
	public function __construct() {
		if ($this->userModel == null) {
			$this->userModel = $this->model('User');
		}
		if ($this->validationServices == null) {
			$this->validationServices = $this->services('Validation');
		}
	}

	/**
	 * Views home page
	 *
	 * @return void
	 */
	public function index() {

		// Check if user have save data to cookies to keep login
		if (isset($_COOKIE['user'])) {
			// die(var_dump($_COOKIE['user'])); 
			$token = $_COOKIE['user'];
			$saved_user = $this->userModel->getUserByToken($token);
			if (!$saved_user) {
				$this->view('users/home');
			}
			$_SESSION['user_id'] = $saved_user->user_id;
			$_SESSION['username'] = $saved_user->username;
			$_SESSION['email'] = $saved_user->email;
			header('location: ' . URLROOT . '/account');
		}

		$this->view('users/home');
	}

}
