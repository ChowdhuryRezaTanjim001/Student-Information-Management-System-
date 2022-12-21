<?php
	require"function.php";
	$user = new dbms();

?>
<!doctype html>
<html class="no-js" lang="">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		
		<title>Registration</title>
		
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="apple-touch-icon" href="apple-touch-icon.png">
		<!-- Place favicon.ico in the root directory -->

		<link rel="stylesheet" href="../../css/font-awesome.min.css">
		<link rel="stylesheet" href="../../css/bootstrap.min.css">	
		<link rel="stylesheet" href="../../css/slicknav.css">
		<link rel="stylesheet" href="../../css/normalize.css">
		<link rel="stylesheet" href="../../css/style.css">
		
		<script src="../../js/vendor/jquery-1.12.0.min.js"></script>
		<script src="../../js/plugins.js"></script>
		<script src="../../js/jquery.slicknav.min.js"></script>
		<script src="../../js/bootstrap.min.js"></script>
		<script src="../../js/jquery.fitvids.js"></script>
		<script src="../../js/main.js"></script>
		<script src="../../js/vendor/modernizr-2.8.3.min.js"></script>
		
		<style>
			
		</style>
		
	</head>
	
<?php
	include "../header.php";
?>
<section class="section clear">
	<aside class="navigation clear">
		<div class="menu">
			<ul>
				<li><a id="home" class="fa fa-home fa-2x" href="../../index.php"> Home</a></li>
				
				<li class="sub-menu"><a class="fa" href="#">&#xf19d; Student <span id="active">&#xf0d8;</span><p>&#xf0d7;</p></a>
					<ul>
						<li><a href="../student/sregistration.php"><i class="fa">&#xf0da; Student Registration</i></a></li>
						<li><a href="../student/slogin.php"><i class="fa">&#xf0da; Student Login</i></a></li>
					</ul>
				</li>
				
				<li class="sub-menu"><a class="fa" href="#">&#xf007; Faculty<span id="active">&#xf0d8;</span><p>&#xf0d7;</p></a>
					<ul>
						<li><a href="fregistration.php"><i class="fa">&#xf0da; Faculty Registration</i></a></li>
						<li><a href="flogin.php"><i class="fa">&#xf0da; Faculty Login</i></a></li>
					</ul>
				</li>
				
				<li><a class="fa" href="../attendance/attendance.php">&#xf0a9; Class Attendance</a></li>
				<li><a  class="fa" href="#">&#xf058; Grading System</a></li>
				
				<li class="sub-menu"><a class="fa" href="#">&#xf25d; Registry <span id="active">&#xf0d8;</span><p>&#xf0d7;</p></a>
					<ul>
						<li><a href="#"><i class="fa">&#xf0da; Admissions</i></a></li>
						<li><a href="#"><i class="fa">&#xf0da; Accounts</i></a></li>
					</ul>
				</li>
				
				<li><a class="fa" href="#">&#xf1fd; Student Birthday</a></li>
				<li><a class="fa" href="#">&#xf06b; Faculty Birthday</a></li>
				<li><a class="fa" href="../admin/alogin.php">&#xf21b; Director Admin</a></li>
			</ul>
		</div>
	</aside>
	
	<div class="main-section clear">
		<p id="demo"></p>
		<script type="text/javascript">						
			var d = new Date();
			var n = d.toLocaleString();
			document.getElementById("demo").innerHTML = n;
		</script>
		
		<?php
			if(($_SERVER['REQUEST_METHOD']=="POST")  && isset($_FILES['profile_pic'])){
				$id = $_POST['id'];
				$name = $_POST['name'];
				$department = $_POST['department'];
				$pass = $_POST['pass'];
				$dob = $_POST['dob'];
				$bg = $_POST['bg'];
				$gender = $_POST['gender'];
				$email = $_POST['email'];
				
				function guid() {
				   if (function_exists('com_create_guid')) {
							return com_create_guid();
						}
					else {
						mt_srand((double) microtime() * 10000); //optional for php 4.2.0 and up.
						$charid = strtoupper(md5(uniqid(rand(), true)));
						$hyphen = chr(45); // "-"
						$uuid = chr(123)// "{"
								. substr($charid, 0, 8) . $hyphen
								. substr($charid, 8, 4) . $hyphen
								. substr($charid, 12, 4) . $hyphen
								. substr($charid, 16, 4) . $hyphen
								. substr($charid, 20, 12)
								. chr(125); // "}"
						return $uuid;
					}
				}
				$filename = $_FILES['profile_pic']['name'];
				 
				 if($filename){	
					$path_parts = pathinfo($_FILES["profile_pic"]["name"]);
					$ext = $path_parts['extension'];
					$filename = trim(guid(), '{}') . '.' . $ext;
				 }
				
				$filetmp = $_FILES['profile_pic']['tmp_name'];
				move_uploaded_file($filetmp, "../../images/fprofile/$filename");
				
				$phone  =  $_POST['phone'];
				$present_add = $_POST['prt_address'];
				$permanent_add = $_POST['pmt_address'];
				
				if(empty($id) or empty($name) or empty($department) or empty($pass) or empty($dob) or empty($gender) or empty($email) or empty($phone) or empty($permanent_add) ){
					if(isset($_POST['submit'])){
						echo"<span style='color:red'>You must have to fill up all those * marks filed.</span>";
					}
				}
				else{
					//$pass = md5($pass);
					$register = $user->registeruser($name,$id,$department  ,  $pass  ,  $bg  ,  $dob  ,  $gender  ,  $email, $phone  ,  $present_add  ,  $permanent_add, $filename);
					if($register){
						echo "Successfully Registered".'</br><a href = "flogin.php"><input type = "button" value = "Login" ></a>';
						exit();
					}
					else{
						echo"Id is already registered.";
					}
				}
			}
			else if(isset($_POST['submit'])){
				echo "Input clearly and try again.";
			}
		?>
		
		<div class="facreg_work-here clear">
			<h3>Faculty Registration</h3>
			<form action="" method="post" enctype="multipart/form-data">
				<table class="reg-table clear">
					<tr>
						<td>Name *</td>
						<td><input type="text" name="name" placeholder="name" /></td>
					</tr>
					<tr>
						<td>User ID *</td>
						<td><input type="text" name="id" placeholder="User id" /></td>
					</tr>
					<tr>
						<td>Department *</td>
						<td>
							<select name="department" class="fac_select clear">
								<option >BCSE</option> 
								<option >BSEEE</option> 
								<option >BSME</option> 
								<option >BSAg</option> 
								<option >BATHM</option> 
								<option >BSCE</option> 
								<option >BBA</option> 
							</select>
						</td>
					</tr>
					<tr>
						<td>Password *</td>
						<td><input type="password" name="pass" placeholder="password"/></td>
					</tr>
					<tr>
						<td>Date of Birth *</td>
						<td><input type="date" name="dob" /></td>
					</tr>
					<tr>
						<td>Blood group</td>
						<td>
							<select name="bg" class="fac_select clear">
								<option  >A+</option> 
								<option >B+</option> 
								<option >AB+</option> 
								<option >O+</option> 
								<option >A-</option> 
								<option >B-</option> 
								<option >AB-</option> 
								<option >O-</option> 
							</select>
						</td>
					</tr>
					<tr>
						<td>Gender *</td>
						<td class="radio"><input type="radio" name="gender" value="male" checked> Male</td>
						<td class="radio"><input type="radio" name="gender" value="female" checked> Female</td>
					</tr>
					<tr>
						<td>Email *</td>
						<td><input type="email" name="email" /></td>
					</tr>
					
					<tr>
						<td>Picture</td>
						<td>									
							<input type="file" name="profile_pic" />
						</td>
					</tr>
					<tr>
						<td>Phone number *</td>
						<td><input type="text" name="phone" /></td>
					</tr>
					<tr>
						<td>Present Address </td>
						<td><input type="text" name="prt_address" /></td>
					</tr>
					<tr>
						<td>Permanent Address *</td>
						<td><input type="text" name="pmt_address" /></td>
					</tr>
					
				</table>
				<input class="r-submit" type="submit" name="submit" value="Register"/>
			</form>
		</div >
	</div >
</section>

<?php
	include "../footer.php";
?>
