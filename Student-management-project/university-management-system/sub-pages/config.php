<?php
	class dbconn{
		public function connection(){
			global $conn;
			$conn = new mysqli("localhost","root","","cse3111");
			return $conn;
		}
	}
?>