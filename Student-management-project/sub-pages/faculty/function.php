<?php
require "../config.php";

class dbms{
	
	public function con(){
		$database = new dbconn();
		return $database->connection();
	}
	public function registeruser($name, $id, $department, $pass, $bg, $dob, $gender, $email, $phone, $present_add, $permanent_add, $filename){
		$query = $this->con()->query("INSERT INTO faculty(name,id,department,password,dob,bg,gender,email,p_number,prt_address,pmt_address,fpic_id)
				VALUES('$name','$id','$department','$pass', '$dob','$bg','$gender', '$email', '$phone', '$present_add', '$permanent_add', '$filename')");//, '$department'  ,  '$pass'  ,  '$dob', '$bg'  ,   '$gender'  ,  '$email', '$phone'  ,  '$present_add'  ,  '$permanent_add')");
		return $query;
	}
	
	//for login function. location:slogin.php
	public function loginuser($id,$prog,$password){
		$result  = $this->con()->query("SELECT id, department, password FROM faculty WHERE id ='$id' ");
		$match = $result->fetch_assoc();
		if($match['id']==$id && $match['department']==$prog && $match['password']==$password){
			session_start();
			$_SESSION['flogin'] = true;
			$_SESSION['fid'] = $id;
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
	public function userupdate($id, $name , $dept ,  $bg  ,  $dob  ,  $email, $phone  ,  $permanent_add  ,$prt_address ,$filename){
		$result = $this->con()->query("UPDATE faculty SET name = '$name', department ='$dept' , bg = '$bg', dob  = '$dob',  email  = '$email', p_number  = '$phone',  prt_address  = ' $prt_address', pmt_address = '$permanent_add', fpic_id = '$filename' WHERE id='$id'");
		return $result;
	}
	
	public function updatepassword($id,$new_pass,$old_pass){
		$result = $this->con()->query("Update faculty set password='$new_pass' where id='$id'");
		if($result){
			return $result;
		}
	}
	
	//location:logout.php
	public function logout(){
		$_SESSION['flogin'] = false;
		unset($_SESSION['fid']);
		unset($_SESSION['fprog']); 
		unset($_SESSION['fpass']);
		session_destroy();
		
	}
}
?>