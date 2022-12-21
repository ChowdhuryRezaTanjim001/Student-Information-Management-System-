<?php
require "../config.php";

class dbms{
	public function con(){
		$database = new dbconn();
		return $database->connection();
	}
	
	//for login function. location:slogin.php
	public function loginuser($id,$password){
		$result  = $this->con()->query("SELECT id,password FROM admin WHERE id ='$id' ");
		$match = $result->fetch_assoc();
		if($match['id']==$id && $match['password']==$password){
			session_start();
			$_SESSION['alogin'] = true;
			$_SESSION['aid'] = $id;
			$_SESSION['apass'] = $pass;
			return true;
		}
		else{
			return false;
		}
	}	
	
	//for checking session
	public function getsession(){
		return @$_SESSION['alogin'];
	}
	
	public function view_student(){
		$result = $this->con()->query("Select * from student");
		return $result;
	}
	public function edit_st_info($id){
		$result = $this->con()->query("Select * from student where id='$id'");
		return $result;
	}
	
	public function userupdate($id, $name , $prog  ,  $pass  ,  $bg  ,  $dob  ,  $gender  ,  $email,$phone  ,  $present_add  ,  $permanent_add  ,  $father_n  ,  $mother_n  ,  $contact,$filename){
		$result = $this->con()->query("UPDATE student SET ID = '$id', Name = '$name', Program  ='$prog' ,password='$pass', Blood_group  = '$bg', Date_of_Birth  = '$dob', Gender='$gender', Email  = '$email', Phone  = '$phone',Pr_Address='$present_add' , Pe_Address  = ' $permanent_add', Father_Name  = '$father_n', Mother_Name= '$mother_n', Contact_no  = '$contact', pic_id='$filename' WHERE ID='$id'");
		return $result;
	}
	
	public function view_subject_id($id){
		$result = $this->con()->query("Select * from subject where sub_id='$id'");
		return $result;
	}
	
	//faculty list here
	public function view_faculty(){
		$result = $this->con()->query("Select * from faculty");
		return $result;
	}
	public function edit_faculty($id){
		$result = $this->con()->query("Select * from faculty where id = '$id'");
		return $result;
	}
	public function result($id){
		$result = $this->con()->query("Select * from marks where s_id = '$id'");
		return $result;
		
	}
	
	
	public function userupdatefaculty($id, $name , $dept , $pass, $bg  ,$gender,  $dob  ,  $email, $phone  ,  $permanent_add  ,$prt_address,$filename){
		$result = $this->con()->query("UPDATE faculty SET id='$id' ,name = '$name', department ='$dept', password='$pass' , bg = '$bg', gender='$gender', dob  = '$dob',  email  = '$email', p_number  = '$phone',  prt_address  = ' $prt_address', pmt_address = '$permanent_add', fpic_id='$filename' WHERE id='$id'");
		return $result;
	}
	
	
	public function delete_faculty($id){
		$result = $this->con()->query("delete from faculty where id='$id'");
		return $result;
	}
	public function delete_student($id){
		$result = $this->con()->query("delete from student where ID='$id'");
		$result = $this->con()->query("delete from marks where s_id ='$id'");
		return $result;
	}
	
	public function get($id){
		$result = $this->con()->query("Select * from student where ID = '$id'");
		return $result;
	}
	public function getfaculty($id){
		$result = $this->con()->query("Select * from faculty where ID = '$id'");
		return $result;
	}
	public function src_result($src_id){
		$result = $this->con()->query("SELECT * FROM student WHERE 
							(ID LIKE '%".$src_id."%'
							OR `Name` LIKE '%".$src_id."%'
							OR `Phone` LIKE '%".$src_id."%'
							OR `Email` LIKE '%".$src_id."%') order by id");
		return $result;
	}
	public function fac_src_result($src_id){
		$result = $this->con()->query("SELECT * FROM faculty WHERE 
							(id LIKE '%".$src_id."%'
							OR `name` LIKE '%".$src_id."%'
							OR `p_number` LIKE '%".$src_id."%'
							OR `email` LIKE '%".$src_id."%') order by id");
		return $result;
	}
	
	public function total_result($id){
		$result = $this->con()->query("Select * from marks where s_id = '$id'");
		return $result;
		
	}
	
	
	
	//location:logout.php
	public function logout(){
		$_SESSION['alogin'] = false;
		unset($_SESSION['aid']); 
		unset($_SESSION['apass']);
		session_destroy();
		
	}
	
}
?>