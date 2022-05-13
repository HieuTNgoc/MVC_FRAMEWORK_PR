<?php
class Login extends Controller {
	public function __construct() {
		if ($this->userModel == null) {
			$this->userModel = $this->model('User');
		}
		if ($this->validationServices == null) {
			$this->validationServices = $this->services('Validation');
		}
	}

	/**
	 * View login page
	 *
	 * @return void
	 */
	public function index() {
		$data = [
			'username' => '',
			'email' => '',
			'password' => '',
			'email_error' => '',
			'password_error' => ''
		];

		$this->view('users/login', $data);
	}

	/**
	 * Login function receive 'post' method validate data 
	 *
	 * @return void redirect to login page or account page
	 */
	public function executeLogin() {
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
			
			// Validate email and password
			$data['email_error'] = $this->validationServices->emailValidation($data['email']);
			$data['password_error'] = $this->validationServices->passwordValidation($data['password']);

			// Check if all errors are not empty
			if (empty($data['email_error']) && empty($data['password_error'])) {
				$logged_in_user = $this->userModel->login($data['email'], $data['password']);
				
				if ($logged_in_user) {
					$this->create_user_session($logged_in_user, $saved);
				} 
				$data['password_error'] = 'Password or Email is incorrect. Please try again!';
			}

			$response = '';
			if (!empty($data['email_error'])) {
				$response = $response . "<br>" . $data['email_error'];
			}
			if (!empty($data['password_error'])) {
				$response = $response . "<br>" . $data['password_error'];
			}
			$this->ajaxResponse(false, $response);
		}
	}

	/**
	 * Create session
	 *
	 * @param [mixed] $user
	 * @return void
	 */
	private function create_user_session($user, $saved) {
		$_SESSION['user_id'] = $user->user_id;
		$_SESSION['username'] = $user->username;
		$_SESSION['email'] = $user->email;
		if ($saved) {
			$token = uniqid('user_', true);
			if ($this->userModel->updateToken($token, $user->user_id)){
				setcookie('user', $token, time() + (60*60*24*30), '/');
			}
		}
		$this->ajaxResponse(true, 'Login Successfully');
	}
}
