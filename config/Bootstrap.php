<?php

/* Grab the url and parse so the proper controller is called  - FHM */
class Bootstrap 
{
	private $ctrl_path = 'application/controllers/';
	private $view_path = 'application/views/';

	public function __construct() 
	{
		// extract and trim last '/'' in URL - FHM 
	    // get url only if it has been set - FHM
		$url = (isset($_GET['url'])) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		//sanitize URL
		//$url = filter_var($url, FILTER_SANITIZE_URL);
		// create array from url - FHM 
		$url = explode('/', $url);
		$this->reroute($url);

	}

	public function reroute($url)
	{    
		$controller_name = '';
		$controller = '';
		
		// handle case where there is no specific page specified in url -> send to a new index page - FHM
		if(empty($url[0]))
		{
			return false;
		}
		else
		{
			if(count($url))
			{
				foreach ($url as $key => $values) {
					$file = $this->ctrl_path . $url[$key] . '_controller.php';

					// look for file, import the file, log error, send to start page - FHM
					if (file_exists($file)) 
					{

						require $file;
						// instantiate controller
						$controller = new $url[$key];
					}
				}	
			}
		}

		// called with 3 arguments, reroute to proper function and pass data ex: /start/add/d/1/2 or /start/add/1/2/3- FHM
		if(isset($url[5]))
		{
			if(method_exists($controller, $url[1]))
			{
				if($url[2] == 'd')
				{
					$controller->{
					$url[1]
					}($url[3], $url[4], $url[5]);
				}
				else
				{
					$controller->{
					$url[1]
					}($url[2], $url[3], $url[4], $url[5]);

					$controller->index();
				}		
			}
			else
			{
				return false;
			}
		}
		else if(isset($url[4]))
		{
			if(method_exists($controller, $url[1]))
			{
				if($url[2] == 'd')
				{
					$controller->{
					$url[1]
					}($url[3], $url[4]);
				}
				else
				{
					$controller->{
					$url[1]
					}($url[2], $url[3], $url[4]);

					$controller->index();
				}		
			}
			else
			{
				return false;
			}
		}
		// called with 2 arguments, reroute to proper function and pass data  ex:/start/add/d/1  or /start/add/1/2 - FHM
		else if(isset($url[3]))
		{
			$method_view = $this->view_path . $url[0]. '/' .$url[1] . '.php';

			if(method_exists($controller, $url[1]))
			{
				if($url[2] == 'd')
				{
					$controller->{
					$url[1]
					}($url[3]);
				}
				else
				{
					$controller->{
					$url[1]
					}($url[2], $url[3]);

					if(file_exists($method_view))
					{						

						$controller->custom($url[0], $url[1]);
					}
					else
					{
						$controller->index();
					}
				}
			}
			else
			{
				return false;
			}
		}
		// called w/1 arguments ex: /start/add/d/ or /start/add/1
		else if (isset($url[2])) 
		{
			$method_view = $this->view_path . $url[0]. '/' .$url[1] . '.php';

			if(method_exists($controller, $url[1]))
			{
				if($url[2] == 'd')
				{
					$controller->{
					$url[1]
					}();
				}
				else
				{
					$controller->{
					$url[1]
					}($url[2]);
					
					if(file_exists($method_view))
					{						
						$controller->custom($url[0], $url[1]);
					}
					else
					{
						$controller->index();
					}
				}
			}
			else
			{
				return false;
			}
			
		} 
		// called w/0 arguments ex:/start/add
		else if (isset($url[1])) 
		{
			$method_view = $this->view_path . $url[0]. '/' .$url[1] . '.php';

			if(method_exists($controller, $url[1]))
			{
				$controller->{
				$url[1]
				}();

				if(file_exists($method_view))
				{
					$controller->custom($url[0], $url[1]);
				}
				else
				{
					$controller->index();	
				}
			}
			else
			{
				return false;
			}
		}
                // called from index of controller
		else
		{    
             $controller->index();
		}
	}	
}
