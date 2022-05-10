<?php
class Login extends Controller
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
			$saved = trim($_POST['password']);
			
			// Validate email
			if (empty($data['email'])) {
				$data['email_error'] = 'Please enter email address.';
			} elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
				$data['email_error'] = 'Please enter the correct email format.';
			}

			//Minimum eight characters, at least one letter and one number
			$passwordValidation = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';

			// Validate password on length(8) and numeric values 
			if (empty($data['password'])) {
				$data['password_error'] = 'Please enter the password.';
			} elseif (strlen($data['password']) < 8) {
				$data['password_error'] = 'Password must be at least 8 characters.';
			} elseif (!preg_match($passwordValidation, $data['password'])) {
				$data['password_error'] = 'Please enter the correct password format.';
			}

			// Check if all errors are not empty
			if (empty($data['email_error']) && empty($data['password_error'])) {
				
				$logged_in_user = $this->userModel->login($data['email'], $data['password']);
				
				if ($logged_in_user) {
					$this->create_user_session($logged_in_user, $saved);
				} else {
					$data['password_error'] = 'Password or Email is incorrect. Please try again!';
				}
			}
			$response = '';
			if ($data['email_error'] != '') $response = $response . "<br>" . $data['email_error'];
			if ($data['password_error'] != '') $response = $response . "<br>" . $data['password_error'];
			die(json_encode([
				'success'	=>	false,
				'msg'	=>	$response
			]));
		}

		$this->view('users/login', $data);
	}

	/**
	 * Create session
	 *
	 * @param [mixed] $user
	 * @return void
	 */
	public function create_user_session($user, $saved){
		$_SESSION['user_id'] = $user->user_id;
		$_SESSION['username'] = $user->username;
		$_SESSION['email'] = $user->email;
		if ($saved) {
			while(true) {
				$token = uniqid('user_', true);
				if ($this->userModel->updateToken($token, $user->user_id)){
					setcookie('user', $token, time() + 60*60*24*30);
					break;
				}
			}
		}
		die(json_encode([
			'success'	=>	true,
			'msg'	=>	'Login Successfully'
		]));
		// header('location: ' . URLROOT . '/account');
	}
}
