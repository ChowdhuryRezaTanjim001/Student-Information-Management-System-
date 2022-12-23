<?php
	class dbconn{
		public function connection(){
			global $conn;
			$conn = new mysqli("localhost","root","","project_311");
			return $conn;
		}
	}
?>