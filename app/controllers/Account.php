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
	public function account()
	{
		$data = [
			'username' => '',
			'email' => '',
			'first_name' => '',
			'last_name' => '',
			'address' => '',
			'phone' => '',
			'img_url' => '',
			'dob' => '',
			'position' => ''
		];

		$user = $this->userModel->loadUserData($_SESSION['user_id']);
		$data['username'] = $user->username;
		$data['email'] = $user->email;
		$data['first_name'] = $user->first_name;
		$data['last_name'] = $user->last_name;
		$data['address'] = $user->address;
		$data['phone'] = $user->phone;
		$data['img_url'] = $user->img_url;
		$data['dob'] = $user->dob;
		$data['position'] = $user->position;

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		}

		$this->view('users/account', $data);
	}
}
