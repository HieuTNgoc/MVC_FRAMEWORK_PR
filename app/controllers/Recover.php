<?php
class Recover extends Controller
{
    /**
	 * View recover page
	 *
	 * @return void
	 */
	public function index(){
		$this->view('users/recover');
	}
}
