<?php
class Users extends Controller
{
	public function __construct()
	{
		$this->userModel = $this->model('User');
	}

	/**
	 * Login function receive 'post' method validate data 
	 *
	 * @return void redirect to login page or account page
	 */
	public function login()
	{
		$data = [
			'username' => '',
			'email' => '',
			'password' => '',
			'email_error' => '',
			'password_error' => ''
		];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Sanitize post data
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

			$data = [
				'username' => '',
				'email' => trim($_POST['email']),
				'password' => trim($_POST['password']),
				'email_error' => '',
				'password_error' => ''
			];

			// Validate email
			if (empty($data['email'])) {
				$data['email_error'] = 'Please enter email address.';
			} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
				$data['email_error'] = 'Please enter the correct format.';
			}

			// Validate password
			if (empty($data['password'])) {
				$data['password_error'] = 'Please enter the password.';
			}

			// Check if all errors are not empty
			if (empty($data['email_error']) && empty($data['password_error'])) {
				$logged_in_user = $this->userModel->login($data['email'], $data['password']);
				
				if ($logged_in_user) {
					$this->create_user_session($logged_in_user);
					header('location: ../users/account');

				} else {
					$data['password_error'] = 'Password or Email is incorrect. Please try again!';
					$this->view('users/login', $data);
				}
			}
		}

		$this->view('users/login', $data);
	}

	/**
	 * Create session
	 *
	 * @param [mixed] $user
	 * @return void
	 */
	public function create_user_session($user){
		session_start();
		$_SESSION['user_id'] = $user->id;
		$_SESSION['username'] = $user->username;
		$_SESSION['email'] = $user->email;
	}

	/**
	 * Register function receive data from 'post' method
	 * Validate data
	 * Add user to the DB
	 *
	 * @return void
	 */
	public function register()
	{

		$data = [
			'username' => '',
			'email' => '',
			'password' => '',
			'confirm_password' => '',
			'username_error' => '',
			'email_error' => '',
			'password_error' => '',
			'confirm_password_error' => ''
		];


		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Sanitize post data
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			$data = [
				'username' => trim($_POST['username']),
				'email' => trim($_POST['email']),
				'password' => trim($_POST['password']),
				'confirm_password' => trim($_POST['confirm_password']),
				'username_error' => '',
				'email_error' => '',
				'password_error' => '',
				'confirm_password_error' => ''
			];

			$nameValidation = '/^[a-zA-Z0-9]*$/';

			//Minimum eight characters, at least one letter and one number
			$passwordValidation = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';

			// Validate username on letter or number
			if (empty($data['username'])) {
				$data['username_error'] = 'Please enter username.';
			} elseif (!preg_match($nameValidation, $data['username'])) {
				$data['username_error'] = 'User name can only contain letters and numbers.';
			} else {
				// Check if username exist
				if ($this->userModel->findUserByUserName($data['username'])) {
					$data['username_error'] = 'Username is already taken. Try again!';
				}
			}

			// Validate email 
			if (empty($data['email'])) {
				$data['email_error'] = 'Please enter email address.';
			} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
				$data['email_error'] = 'Please enter the correct format.';
			} else {
				// Check if email exist
				if ($this->userModel->findUserByEmail($data['email'])) {
					$data['email_error'] = 'Email is already taken. Try again!';
				}
			}

			// Validate password on length(8) and numeric values 
			if (empty($data['password'])) {
				$data['password_error'] = 'Please enter the password.';
			} elseif (strlen($data['password']) < 8) {
				$data['password_error'] = 'Password must be at least 8 characters.';
			} elseif (!preg_match($passwordValidation, $data['password'])) {
				$data['password_error'] = 'Please enter the correct';
			}

			// Validate confirm password
			if (empty($data['confirm_password'])) {
				$data['confirm_password_error'] = 'Please enter the confirm password.';
			} else {
				if ($data['password'] != $data['confirm_password']) {
					$data['confirm_password_error'] = 'Password do not match, please try again.';
				}
			}

			// Make sure that Errors are empty
			if (empty($data['username_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) {
				// Hash password
				$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

				// Register user from model function
				if ($this->userModel->register($data)) {
					// Redirect to the login page
					header('location: ../users/login');
				} else {
					die('Something went wrong.');
				}
			}
		}

		$this->view('users/register', $data);
	}

	/**
	 * Manage recover page
	 *
	 * @return void
	 */
	public function recover()
	{
		$data = [
			'title' => 'Recover - Base Account'
		];

		$this->view('users/recover', $data);
	}

	/**
	 * Manage Account page
	 *
	 * @return void
	 */
	public function account()
	{
		$data = [
			'title' => 'Account - Base Account'
		];

		$this->view('users/account', $data);
	}
}
