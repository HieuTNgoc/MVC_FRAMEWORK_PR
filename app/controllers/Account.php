<?php
class Account extends Controller
{
	public function __construct()
	{
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

		$this->view('users/account', $data);
	}

	public function updateUser() {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$data = [
				'first_name' => '',
				'last_name' => '',
				'address' => '',
				'phone' => '',
				'position' => ''
			];

			$user = $this->userModel->loadUserData($_SESSION['user_id']);
			$data['first_name'] = $user->first_name;
			$data['last_name'] = $user->last_name;
			$data['address'] = $user->address;
			$data['phone'] = $user->phone;
			$data['position'] = $user->position;
			// Sanitize post data
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

			$user_id = $_SESSION['user_id'];
			$username = $_SESSION['username'];
			$first_name = trim($_POST['first_name']);
			$last_name = trim($_POST['last_name']);
			$address = trim($_POST['address']);
			$phone = trim($_POST['phone']);
			$position = trim($_POST['position']);

			$response_ava = '';
			$response_info = '';

			if ($first_name != $data['first_name'] || $last_name != $data['last_name'] || $address != $data['address'] || $phone != $data['phone'] || $position != $data['position']) {
				$update_data = $this->userModel->updateUser($first_name, $last_name, $position, $phone, $address, $user_id);
			} else {
				$response_info = "Nothing change with user info. ";
			}

			if (isset($_FILES['file'])) {
				if (0 < $_FILES['file']['error']) {
					$response_ava = 'Error: ' . $_FILES['file']['error'];
				} else {
					move_uploaded_file($_FILES['file']['tmp_name'], 'img/' . $username . '.png');
				}
			} else {
				$response_ava = "Nothing change with user avatar. ";
			}
			
			// if ($response_ava == '' && $response_info == '') {
			// 	die(json_encode([
			// 		'success' => true,
			// 		'msg' => "Update user data successfully! "
			// 	]));
			// }
			
			// if ($update_data) {
			// 	die(json_encode([
			// 		'success' => true,
			// 		'msg' => "Update user info successfully! " . $response_ava
			// 	]));
			// }
			
			// die(json_encode([
			// 	'success' => false,
			// 	'msg' => $response_ava . $response_info
			// ]));
			die(json_encode([
				'success' => false,
				'msg' => $response_ava . $response_info
			]));
		}
	}
	public function updateUserImg() {

		$username = $_SESSION['username'];

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			if (0 < $_FILES['file']['error']) {
				die(json_encode([
					'success' => false,
					'msg' => 'Error: ' . $_FILES['file']['error']
				]));
			} else {
				move_uploaded_file($_FILES['file']['tmp_name'], 'img/' . $username . '.png');
				die(json_encode([
					'success' => true,
					'msg' => "Update avatar successfully!"
				]));
			}
		}
	}

	public function changePassword()
	{

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// Sanitize post data
			$_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

			$old_pass = trim($_POST['old_pass']);
			$user_id = $_SESSION['user_id'];
			$new_pass = trim($_POST['new_pass']);

			// Validate password
			$passwordValidation = '/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/';
			if (!preg_match($passwordValidation, $new_pass)) {
				die(json_encode([
					'success' => false,
					'msg' => 'Can not update, new password with wrong format!'
				]));
			}

			if ($this->userModel->checkPassword($old_pass, $user_id)) {
				$new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
				$update_pass = $this->userModel->updateUserPassword($new_pass, $user_id);
				if ($update_pass) {
					die(json_encode([
						'success' => true,
						'msg' => "Update password successfully!"
					]));
				}
			}

			die(json_encode([
				'success' => false,
				'msg' => 'Can not update with wrong! Wrong old password!'
			]));
		}
	}
}
