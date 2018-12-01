<?php
	
	class Controller
	{
		protected function model($model)
		{
			require_once 'app' . DIRECTORY_SEPARATOR . 'core' . DIRECTORY_SEPARATOR . 'Model.php';
			require_once 'app' . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR . $model . '.php';
			
			return new $model;
		}
		
		protected function view($folder, $view, $data = [])
		{		
			extract($data);
			require_once 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $view . '.php';
		}
		
		protected function redirect_to($url, $old_data = [], $errors = [], $permanent = false)
		{
			if(!empty($old_data)){
				$_SESSION['old'] = $old_data;
			}
			
			if(!empty($errors)){
				$_SESSION['errors'] = $errors;
			}
			
			exit(header('Location: ' . BASE_URL . $url, true, $permanent ? 301 : 302));
		}
		
		protected function extract_data($fields, &$data, &$errors){
			
			foreach($this->fields as $key => $value){			
				if(is_numeric($key)) {
					if(isset($_POST[$value])) {
						if($_POST[$value] == 'on'){
							$data[$value] = 1;
						} 
						else {
							$data[$value] = $_POST[$value];
						}
					} 
					else {
						$data[$value] = 0;
					}
				} 
				else {
					if(!isset($_POST[$key]) || (empty($_POST[$key]) && !is_numeric($_POST[$key])) ){
						$errors[$key] = $value . ' is required';
					}
					
					if(isset($_POST[$key])){
						if($_POST[$key] == 'on'){
							$data[$key] = 1;
						} 
						else {
							$data[$key] = $_POST[$key];
						}
					} 
					else {
						$data[$key] = 0;
					}
				}
			}
		}
		
		protected function json($data){
			header('Content-Type: application/json');
			return html_entity_decode(json_encode($data));
		}
	}
	
	
?>