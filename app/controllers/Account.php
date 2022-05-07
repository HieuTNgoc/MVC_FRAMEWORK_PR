<?php
class Account extends Controller
{
	public function __construct() {
		$this->userModel = $this->model('User');
	}

   /**
	 * Manage Account page
	 *
	 * @return void
	 */
	public function account() {
		$data = [
			'user_id' => '',
			'username' => '',
			'email' => '',
			'first_name' => '',
			'last_name' => '',
			'address' => '',
			'phone' => '',
			'img_url' => '',
			'position' => ''
		];

		$user = $this->userModel->loadUserData($_SESSION['user_id']);
		$data['user_id'] = $user->user_id;
		$data['username'] = $user->username;
		$data['email'] = $user->email;
		$data['first_name'] = $user->first_name;
		$data['last_name'] = $user->last_name;
		$data['address'] = $user->address;
		$data['phone'] = $user->phone;
		$data['img_url'] = $user->img_url;
		$data['position'] = $user->position;

		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Sanitize post data
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

			$data['first_name'] = trim($_POST['first_name']);
			$data['last_name'] = trim($_POST['last_name']);
			// $data['address'] = trim($_POST['address']);
			$data['phone'] = trim($_POST['phone']);
			$data['img_url'] = trim($_POST['img_url']);
			$data['position'] = trim($_POST['position']);

			$update_data = $this->userModel->updateUser($data['first_name'], $data['last_name'], $data['img_url'], $data['position'], $data['user_id']);
			echo $update_data; 
			// echo var_dump($data);
		}

		$this->view('users/account', $data);
	}
}
