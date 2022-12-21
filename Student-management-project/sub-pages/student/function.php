<?php

require "../config.php";



class dbms{

	

	public function con(){

		$database = new dbconn();

		return $database->connection();

	}

	public function registeruser($id, $name, $prog  ,  $pass  ,  $bg  ,  $dob  ,  $gender  ,  $email, $phone  ,  $present_add  ,  $permanent_add  ,  $father_n  ,  $mother_n  ,  $contact, $filename){

		$query = $this->con()->query("INSERT INTO student(ID,Name,Program, password, Blood_group, Date_of_Birth, Gender, Email, Phone, Pr_Address, Pe_Address, Father_Name, Mother_Name, Contact_no,pic_id)

				VALUES('$id', '$name', '$prog'  ,  '$pass'  ,  '$bg'  ,  '$dob'  ,  '$gender'  ,  '$email', '$phone'  ,  '$present_add'  ,  '$permanent_add'  ,  '$father_n'  ,  '$mother_n'  ,  '$contact' , ' $filename')");

		return $query;

	}

	

	public function view_subject_id($id){

		$result = $this->con()->query("Select * from subject where sub_id='$id'");

		return $result;

	}

	

	//for login function. location:slogin.php

	public function loginuser($id,$prog,$password){

		$result  = $this->con()->query("SELECT ID, Program, password FROM student WHERE ID ='$id' ");

		$match = $result->fetch_assoc();

		if($match['ID']==$id && $match['Program']==$prog && $match['password']==$password){

			session_start();

			$_SESSION['login'] = true;

			$_SESSION['id'] = $id;

			$_SESSION['prog'] = $prog;

			$_SESSION['pass'] = $password;

			$_SESSION['login_msg'] = 'Login successfully..!';

			return true;

		}

		else{

			return false;

		}

	}	

	

	//for checking session

	public function getsession(){

		return @$_SESSION['login'];

	}

	

	public function get($id){
		

		$result = $this->con()->query("Select * from student where ID = '$id'");
		
		return $result;

	}

	public function userupdate($id, $name , $prog ,  $bg  ,  $dob  ,  $email,$phone  ,  $permanent_add  ,  $father_n  ,  $mother_n  ,  $contact , $filename){

		$result = $this->con()->query("UPDATE student SET ID = '$id', Name = '$name', Program  ='$prog' , Blood_group  = '$bg', Date_of_Birth  = '$dob',  Email  = '$email', Phone  = '$phone',  Pe_Address  = ' $permanent_add', Father_Name  = '$father_n', Mother_Name  = '$mother_n', Contact_no  = '$contact' ,pic_id ='$filename' WHERE ID='$id'");

		return $result;

	}

	

	public function updatepassword($id,$new_pass,$old_pass){

		$result = $this->con()->query("Update student set password='$new_pass' where ID='$id'");

		if($result){

			return $result;

		}

	}

	public function result($id){

		$result = $this->con()->query("Select * from marks where s_id = '$id'");

		return $result;

		

	}

	

	//location:logout.php

	public function logout(){

		$_SESSION['login'] = false;

		unset($_SESSION['id']);

		unset($_SESSION['prog']); 

		unset($_SESSION['pass']);

		session_destroy();

		

	}

}

?>