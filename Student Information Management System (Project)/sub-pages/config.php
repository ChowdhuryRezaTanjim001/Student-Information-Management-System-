<?php
	class dbconn{
		public function connection(){
			global $conn;
			$conn = new mysqli("localhost","root","","cse311_project");
			return $conn;
		}
	}
?>