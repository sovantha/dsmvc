<?php  
	class User extends Model
	{
		public function get_all() {
			$sql = 'SELECT * FROM users';
			
			$result = $this->db->query($sql);
			
			$users = $result->fetch_all(MYSQLI_ASSOC);
			
			$result->free();
			
			return $users;
		}
	}
?>