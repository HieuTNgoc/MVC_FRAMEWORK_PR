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
			'title' => 'Account - Base Account'
		];

		$this->view('users/account', $data);
	}
}
