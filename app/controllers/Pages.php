<?php
class Pages extends Controller
{
	public function __construct()
	{
	}
	public function index()
	{
		$data = [
			'title' => 'home page',
			'name' => 'Hieu'
		];

		$this->view('pages/index', $data);
	}
	public function about()
	{
		$this->view('pages/about');
	}
}
