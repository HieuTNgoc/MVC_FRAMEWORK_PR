<?php
class Recover extends Controller
{
	public function __construct() {
		if ($this->userModel == null) {
			$this->userModel = $this->model('User');
		}
	}

    /**
	 * View recover page
	 *
	 * @return void
	 */
	public function index()
	{
		$this->view('users/recover');
	}
}
