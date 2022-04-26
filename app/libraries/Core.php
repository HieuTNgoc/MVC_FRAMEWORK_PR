<?php
//Core App Class
class Core
{
	// Auto Load if do not exist any controller in controller folder
	protected $currentController = 'Pages';
	// Method of the currentController
	protected $currentMethod = 'index';
	// Arr to fetch URL 
	protected $params = [];

	public function __construct()
	{
		// print_r($this->getUrl());
		$url = $this->getUrl();

		// Look in 'controller' for first value, ucwords will capitalize first letter
		if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
			// Set a new controller
			$this->currentController = ucwords($url[0]);
			unset($url[0]);
		}

		// Import the controller 
		require_once '../app/controllers/' . $this->currentController . '.php';
		$this->currentController = new $this->currentController;

		if (isset($url[1])) {
			if (method_exists($this->currentController, $url[1])) {
				$this->currentMethod = $url[1];
				unset($url[1]);
			}
		}

		// Get parameters
		$this->params = $url ? array_values($url) : [];

		// Call a callback with array of params
		call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
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
