<?php
	
	class Application
	{
		protected $controller = 'home';
		
		protected $method = 'index';
		
		protected $params = [];
		
		public function __construct()
		{
			$url = $this->parse_url();
			
			if(file_exists('app' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $url[0] . '.php'))
			{
				$this->controller = $url[0];
				unset($url[0]);
			}
			
			require_once 'app' . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . $this->controller . '.php';
			
			$str_class = str_replace('-', '', $this->controller);
			$str_class = str_replace('_', '', $str_class);
			
			$this->controller = new $str_class;
			
			if(isset($url[1]))
			{
				if(method_exists($this->controller, $url[1]))
				{
					$this->method = $url[1];
					unset($url[1]);
					
					
					if(in_array($this->method, ['store', 'update', 'remove']) 
					|| substr($this->method, 0, 5) === 'post_') {
						
						if($_SERVER['REQUEST_METHOD'] !== 'POST'){
							
							http_response_code(405);
							require_once 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . '405.php';
							exit();
							
						}
						
					}
				}
			}
			
			$this->params = $url ? array_values($url) : [];
			
			call_user_func_array([$this->controller, $this->method], $this->params);
			
			unset($_SESSION['old']);
			unset($_SESSION['errors']);
		}
		
		protected function parse_url()
		{
			if(isset($_GET['url'])) {
				$trim_url = rtrim($_GET['url'], '/');
				$sanitize_url = filter_var($trim_url, FILTER_SANITIZE_URL);
				return explode('/', $sanitize_url);
			}
		}
	}
	
?>