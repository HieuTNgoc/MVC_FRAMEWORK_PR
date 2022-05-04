<?php
class Recover extends Controller
{
	public function __construct() {
		$this->userModel = $this->model('User');
	}

    /**
	 * Manage recover page
	 *
	 * @return void
	 */
	public function recover()
	{
		$data = [
			'title' => 'Recover - Base Account'
		];

		$this->view('users/recover', $data);
	}
}
