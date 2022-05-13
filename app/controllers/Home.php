<?php
class Home extends Controller {
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
