<?php
//Core App Class
class Core
{
	// Auto Load if do not exist any controller in controller folder
	protected $current_controller = 'Home';
	// Method of the currentController
	protected $current_method = 'home';
	// Arr to fetch URL 
	protected $params = [];

	public function __construct()
	{
		// print_r($this->getUrl());
		$url = $this->getUrl();

		// Look in 'controller' for first value, ucwords will capitalize first letter
		if (file_exists(APPROOT . '\/controllers\/' . ucwords($url[0]) . '.php')) {
			// Set a new controller
			$this->current_controller = ucwords($url[0]);
			$this->current_method = $url[0];
			if (!isLoggedIn()) {
				if ($url[0] != 'login' && $url[0] != 'home' && $url[0] != 'register') {
					$this->current_controller = 'Home';
					$this->current_method = 'home';
					if (isset($url[1])) unset($url[1]);
				}
			} else {
				if ($url[0] == 'login') {
					$this->current_controller = 'Home';
					$this->current_method = 'home';
					if (isset($url[1])) unset($url[1]);
				}
			}
			unset($url[0]);			
		}

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

	public function getUrl()
	{
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
