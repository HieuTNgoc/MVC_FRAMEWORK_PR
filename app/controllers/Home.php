<?php
class Home extends Controller
{
	public function __construct()
	{
		if ($this->userModel == null) {
			$this->userModel = $this->model('User');
		}
	}

	/**
	 * Views home page
	 *
	 * @return void
	 */
	public function index()
	{
		$this->view('users/home');
	}

}
