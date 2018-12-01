<?php
	
	class Home extends Controller
	{	
		function index() {
			$data['title'] = 'DSMVC';
			$data['about'] = 'A Dead Simple, PHP Model View Controller Boilerplate.';
			
			return $this->view('home', 'index', $data);
		}
	}
	
?>