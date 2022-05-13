<?php
class Register extends Controller {
	
	public function __construct() {
		if ($this->userModel == null) {
			$this->userModel = $this->model('User');
		}
		if ($this->validationServices == null) {
			$this->validationServices = $this->services('Validation');
		}
	}

	/**
	 * Register function receive data from 'post' method
	 * Validate data
	 * Add user to the DB
	 *
	 * @return void
	 */
	public function index() {

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

		$this->view('users/register', $data);
	}	

	/**
	 * Register function receive data from 'post' method
	 * Validate data
	 * Add user to the DB
	 *
	 * @return void
	 */
	public function executeRegister() {
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

			// Validate username
			$data['username_error'] = $this->validationServices->nameValidation($data['username']);
			// Check if username exist
			if ($this->userModel->findUserByUserName($data['username'])) {
				$data['username_error'] = 'Username is already taken. Try again!';
			}

			// Validate email 
			$data['email_error'] = $this->validationServices->emailValidation($data['email']);
			// Check if email exist
			if ($this->userModel->findUserByEmail($data['email'])) {
				$data['email_error'] = 'Email is already taken. Try again!';
			}

			// Validate password and confirm password 
			$data['password_error'] = $this->validationServices->passwordValidation($data['password']);
			if ($data['password'] != $data['confirm_password']) {
				$data['confirm_password_error'] = 'Password do not match, please try again.';
			}
			
			// Make sure that Errors are empty
			if (empty($data['username_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) {
				// Hash password
				$data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
				
				// Register user from model function
				if ($this->userModel->register($data)) {
					$this->ajaxResponse(true, 'Register Successfully!');
				} 
				$this->ajaxResponse(false, 'Something went wrong with create user function (database).');
			} 
			
			$response = '';
			if (!empty($data['username_error'])) {
				$response = $response . "<br>" . $data['username_error'];
			}
			if (!empty($data['email_error'])) {
				$response = $response . "<br>" . $data['email_error'];
			}
			if (!empty($data['password_error'])) { 
				$response = $response . "<br>" . $data['password_error'];
			}
			if (!empty($data['confirm_password_error'])) {
				$response = $response . "<br>" . $data['confirm_password_error'];
			}
			$this->ajaxResponse(false, $response);
		}
	}	
}
