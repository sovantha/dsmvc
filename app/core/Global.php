<?php
	
	function dsmvc_page_title($name = ''){
		if($name != ''){
			$GLOBALS += get_defined_vars();
		} 
		else {
			global $name;
			return $name;
		}
	}
	
	function dsmvc_header(){
		$stylesheets = [];
		for ($i = 0; $i < func_num_args(); $i++) {
			$stylesheets[] = func_get_arg($i);
		}
		
		$GLOBALS += get_defined_vars();
		
		include_once(DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'header.php');
	}
	
	function dsmvc_footer(){
		$javascripts = [];
		for ($i = 0; $i < func_num_args(); $i++) {
			$javascripts[] = func_get_arg($i);
		}
		
		$GLOBALS += get_defined_vars();
		
		require_once(DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . 'footer.php');
	}
	
	function dsmvc_include_stylesheets(){
		global $stylesheets;
		foreach($stylesheets as $css) { 
			echo dsmvc_stylesheet($css); 
		}
	}
	
	function dsmvc_include_javascripts(){
		global $javascripts;		
		foreach($javascripts as $js) { 
			echo dsmvc_javascript($js); 
		}
	}	
		
	function dsmvc_stylesheet($href){	
		return nl2br('<link href="' . BASE_URL . '/' . $href .'" rel="stylesheet">');
	}
	
	function dsmvc_javascript($src){
		return nl2br('<script src="' . BASE_URL . '/' . $src .'"></script>');
	}
	
	
	function has_errors(){
		return isset($_SESSION['errors']);
	}
	
	function get_errors(){
		return $_SESSION['errors'];
	}
	
	function has_old_inputs(){
		return isset($_SESSION['old']);
	}
	
	function get_old_inputs(){
		return $_SESSION['old'];
	}
	
	function old_input($field){
		return isset($_SESSION['old'][$field]) ? $_SESSION['old'][$field] : '';
	}
	
	function is_logged_in() {
		return isset($_SESSION['user']);
	}
	
	function login($user) {
		$_SESSION['user'] = $user;
	}
	
	function logout() {
	unset($_SESSION['user']);
	}
	
	?>	