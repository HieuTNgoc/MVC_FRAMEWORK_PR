<?php
//Routing Class
class Routing {
	// Auto Load if do not exist any controller in controller folder
	protected $current_controller = 'Home';
	// Method of the currentController
	protected $current_method = 'index';
	// Arr to fetch URL 
	protected $params = [];

	public function __construct() {
		//print_r($this->getUrl());
		$url = $this->getUrl();

		// Return view home page if not login yet and request controller 'account'
		if ($url[0] == 'account' && !isset($_SESSION['username'])) {
			return $this->callController();
		}

		// Look in controller for first value
		if (file_exists(APPROOT . '\/controllers\/' . ucwords($url[0]) . '.php')) {
			$this->current_controller =  ucwords($url[0]);
		}

		// Return views if have no method request or if enter wrong controller
		if (!isset($url[1]) || !file_exists(APPROOT . '\/controllers\/' . ucwords($url[0]) . '.php')) {
			return $this->callController();
		}
		unset($url[0]);
		
		// Import the controller 
		require_once APPROOT . '\/controllers\/' . $this->current_controller . '.php';
		$this->current_controller = new $this->current_controller;

		if (isset($url[1])) {
			if (method_exists($this->current_controller, $url[1])) {
				$this->current_method = $url[1];
				unset($url[1]);
			}
		}

		// Get parameters
		$this->params = $url ? array_values($url) : [];

		// Call a callback with array of params
		call_user_func_array([$this->current_controller, $this->current_method], $this->params);

	}

	/**
	 * Call controller by callback 
	 *
	 * @return void
	 */
	private function callController() {
		require_once APPROOT . '\/controllers\/' . $this->current_controller . '.php';
		$this->current_controller = new $this->current_controller;
		return call_user_func_array([$this->current_controller, $this->current_method], $this->params);
	}


	/**
	 * Get url, split into array
	 *
	 * @return array
	 */
	private function getUrl() {
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			// Filter variables as string/number
			$url = filter_var($url, FILTER_SANITIZE_URL);
			// Breaking it in to an arr
			$url = explode('/', $url);
			return $url;
		}
	}
}
