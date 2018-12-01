<?php
	
	class Model {
		protected $db = null;
		
		public function __construct() {		
			$this->db = new mysqli(SERVER, USER, PASSWORD, DATABASE);
			$this->db->set_charset("utf8");
			
			if($this->db->connect_errno > 0){
				die('Unable to connect to database [' . $db->connect_error . ']');
			}
		}
		
		public function close_db(){
			$this->db->close();
		}
	}
	
?>