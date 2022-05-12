<?php
// Load the model and the view
class Controller
{
	public $userModel = null;

	public function model($model)
	{
		// Require model file
		require_once APPROOT . '\/models\/' . $model . '.php';
		// Instantiate model
		return new $model;
	}

	public function view($view, $data = [])
	{
		if (file_exists(APPROOT . '\/views\/' . $view . '.php')) {
			require_once APPROOT . '\/views\/' . $view . '.php';
		} else {
			die("View does not exists.");
		}
	}

	public function ajaxResponse($success, $response)
	{
		die(json_encode([
			'success' => $success, 
			'msg' => $response
		]));
	}
}
