<?php
require "../config.php";

class dbms{
	
	public function con(){
		$database = new dbconn();
		return $database->connection();
	}
	
	//for login function. location:slogin.php
	public function loginuser($id,$prog,$password){
		$result  = $this->con()->query("SELECT id, department, password,name FROM faculty WHERE id ='$id' ");
		$match = $result->fetch_assoc();
		if($match['id']==$id && $match['department']==$prog && $match['password']==$password){
			session_start();
			$_SESSION['flogin'] = true;
			$_SESSION['fid'] = $id;
			$_SESSION['fname'] = $match['name'];
			$_SESSION['fprog'] = $prog;
			$_SESSION['fpass'] = $password;
			$_SESSION['flogin_msg'] = 'Login successfully..!';
			return true;
		}
		else{
			return false;
		}
	}	
	
	//for checking session
	public function getsession(){
		return @$_SESSION['flogin'];
	}
	
	public function get($id){
		$result = $this->con()->query("Select * from faculty where id = '$id'");
		return $result;
	}
	
	public function view_student(){
		$result = $this->con()->query("Select * from student");
		return $result;
	}
	
	public function view_student_ind($id){
		$result = $this->con()->query("Select * from student where ID='$id'");
		return $result;
	}
	
	public function check_attendance($sub_id,$date){
		$result = $this->con()->query("Select * from attendance where sub_id = '$sub_id' and date = '$date'");
		return $result;
	}
	public function view_subject(){
		$result = $this->con()->query("Select * from subject");
		return $result;
		
	}
	
	public function select_all($sub_id){
		$result = $this->con()->query("Select * from attendance where sub_id = '$sub_id'");
		return $result;
	}
	public function select_fixed($sub_id,$date){
		$result = $this->con()->query("Select * from attendance where sub_id = '$sub_id' and date='$date'");
		return $result;
	}
	
	public function distinkt_date($sub_id){
		$result = $this->con()->query("SELECT DISTINCT(date) FROM attendance where sub_id='$sub_id' order by date desc ");
		return $result;
	}
	
	
	public function student_present($s_id,$sub_id,$status,$date){
		$query = $this->con()->query("INSERT INTO attendance(s_id,sub_id,status,date)
				VALUES('$s_id','$sub_id','$status','$date')");
		return $query;
	}
	
	public function update_present($s_id,$sub_id,$status,$date){
		$query = $this->con()->query("update attendance set status='$status' where s_id='$s_id' and sub_id='$sub_id' and date='$date'");
		return $query;
	}

	
	//location:logout.php
	public function logout(){
		$_SESSION['flogin'] = false;
		unset($_SESSION['fid']);
		unset($_SESSION['fprog']); 
		unset($_SESSION['fpass']);
		unset($_SESSION['name']);
		session_destroy();
		
	}
}
?>