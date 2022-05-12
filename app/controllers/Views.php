<?php
class Views extends Controller
{
	public function __construct() {
		$this->userModel = $this->model('User');
	}

	/**
	 * Views home page
	 *
	 * @return {view, data}
	 */
	public function home()
	{
		$users = $this->userModel->getUsers();

		$data = [
			'title' => 'home page',
			'users' => $users
		];
		
		$this->view('users/home', $data);
	}

    /**
	 * Views login page
	 *
	 * @return {view, data}
	 */
    public function login() {
		$data = [
			'username' => '',
			'email' => '',
			'password' => '',
			'email_error' => '',
			'password_error' => ''
		];

		if (isset($_COOKIE['user'])) {
			$token = $_COOKIE['user'];
			$saved_user = $this->userModel->getUserByToken($token);
			if (!$saved_user) {
				$this->view('users/login', $data);
			}
			$_SESSION['user_id'] = $saved_user->user_id;
			$_SESSION['username'] = $saved_user->username;
			$_SESSION['email'] = $saved_user->email;
			header('location: ' . URLROOT . '/account');
		}

		$this->view('users/login', $data);
	}
}
