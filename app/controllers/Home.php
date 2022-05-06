<?php
class Home extends Controller
{
	public function __construct()
	{
		$this->userModel = $this->model('User');
	}

	/**
	 * Views home page
	 *
	 * @return void
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

}
