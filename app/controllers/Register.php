<?php
class Register extends Controller {
	
	public function __construct() {
		$this->userModel = $this->model('User');
	}

	/**
	 * Register function receive data from 'post' method
	 * Validate data
	 * Add user to the DB
	 *
	 * @return void
	 */
	public function register() {

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

			$name_validation = '/^[a-zA-Z0-9]*$/';

			//Minimum eight characters, at least one letter and one number
			$password_validation = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';

			// Validate username on letter or number
			if (empty($data['username'])) {
				$data['username_error'] = 'Please enter username.';
			} elseif (!preg_match($name_validation, $data['username'])) {
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
				$data['email_error'] = 'Please enter the correct email format.';
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
			} elseif (!preg_match($password_validation, $data['password'])) {
				$data['password_error'] = 'Please enter the correct password format.';
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
					die(json_encode([
						'success' => true,
						'msg' => 'Register Successfully!'
					]));
					// header('location: ' . URLROOT . '/login');
				} else {
					die(json_encode([
						'success' => false,
						'msg' => 'Something went wrong with create user function (database).'
					]));
				}
			} 
			$response = '';
			if ($data['username_error'] != '') {
				$response = $response . "<br>" . $data['username_error'];
			}
			if ($data['email_error'] != '') {
				$response = $response . "<br>" . $data['email_error'];
			}
			if ($data['password_error'] != '') { 
				$response = $response . "<br>" . $data['password_error'];
			}
			if ($data['confirm_password_error'] != '') {
				$response = $response . "<br>" . $data['confirm_password_error'];
			}
			die(json_encode([
				'success' => false,
				'msg' => $response
			]));
		}
		$this->view('users/register', $data);
	}	
}
