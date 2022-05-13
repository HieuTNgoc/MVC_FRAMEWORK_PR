<?php
// Load the model and the view
class Controller {
	public $userModel = null;
	public $validationServices = null;

	/**
	 * Import service
	 *
	 * @param [string] $service
	 * @return object
	 */
	public function services($service) {
		// Require service file
		require_once APPROOT . '\/services\/' . $service . '.php';
		// Instantiate service
		return new $service(); 
	}

	/**
	 * Import model
	 *
	 * @param [string] $model
	 * @return object
	 */
	public function model($model) {
		// Require model file
		require_once APPROOT . '\/models\/' . $model . '.php';
		// Instantiate model
		return new $model;
	}

	/**
	 * Return view HTML
	 *
	 * @param [string] $view
	 * @param array $data
	 * @return void
	 */
	public function view($view, $data = []) {
		if (file_exists(APPROOT . '\/views\/' . $view . '.php')) {
			require_once APPROOT . '\/views\/' . $view . '.php';
		} else {
			die("View does not exists.");
		}
	}

	/**
	 * Response to ajax
	 *
	 * @param [bool] $success
	 * @param [string] $response
	 * @return array
	 */
	public function ajaxResponse($success, $response) {
		die(json_encode([
			'success' => $success, 
			'msg' => $response
		]));
	}
}
