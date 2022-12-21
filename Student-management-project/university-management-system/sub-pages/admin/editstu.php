<?php
	require"function.php";
	$user = new dbms();
?>

<!doctype html>
<html class="no-js" lang="">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		
		<title>Edit</title>
		
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
		
	</head>
	
<?php
	include "../header.php";
?>
<section class="section clear">	
	<div class="admin_stupdate">
			
				<?php
				if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['usubmit']) &&  isset($_FILES['profile_pic'])){
					$id = $_POST['id'];
					$name = $_POST['name'];
					$prog = $_POST['Program'];
					$pass = $_POST['pass'];
					$dob = $_POST['dob'];
					$bg = $_POST['bg'];
					$gender = $_POST['gender'];
					$email = $_POST['email'];
					$phone  =  $_POST['phone'];
					
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
						
						/*if(file_exists("../../images/profile/$filename")){
							unlink("../../images/profile/$filename");
						}*/
						move_uploaded_file($filetmp,"../../images/profile/$filename");
					
					$present_add = $_POST['prt_address'];
					$permanent_add = $_POST['pmt_address'];
					$father_n = $_POST['father_name'];
					$mother_n = $_POST['mother_name'];
					$contact = $_POST['g_phone'];
					
					if(empty($name) or empty($prog) or empty($dob) or empty($email) or empty($phone) or empty($permanent_add) ){
						if(isset($_POST['usubmit'])){
							echo"<span style='color:red'>You must have to fill up all those * marks filed.</span><br>";
						}
					}
					else{
						$update = $user->userupdate($id, $name , $prog  ,  $pass  ,  $bg  ,  $dob  ,  $gender  ,  $email,$phone  ,  $present_add  ,  $permanent_add  ,  $father_n  ,  $mother_n  ,  $contact,$filename);
						//$update = $user->userupdate($id ,$father_n );
						if($update){
							echo"<span style='color:#009900;font-weight:bold; margin-left: 150px;'>Update successfully !</span><br>";
						}
					}
				}
			?>
			<?php
				$id = $_GET['id'];
				$result = $user->get($id);
				$row = $result -> fetch_assoc();
			?>
			<span class="profile_headding">Update Profile</span>
			
			<form action="" method="post" name="rag" enctype="multipart/form-data">
			<div class="stu_update clear">
				<table >
					<tr>
						<td>ID *</td>
						<td><input type="text" name="id" value="<?php echo $id;?>" readonly/></td>
					</tr>
					<tr>
						<td>Name *</td>
						<td><input type="text" name="name" value="<?php echo $row['Name'];?>" /></td>
					</tr>
					<tr>
						<td>Program *</td>
						<td>
							<select name="Program" class="select clear" selected="<?php echo $row['Program'];?>">
								<option  >BCSE</option> 
								<option  >BSEEE</option> 
								<option  >BSME</option> 
								<option  >BSAg</option> 
								<option  >BATHM</option> 
								<option  >BSCE</option> 
								<option  >BBA</option> 
							</select>
						</td>
					</tr>
					<tr>
						<td>Password *</td>
						<td><input type="password" name="pass" value="<?php echo $row['password'];?>" /></td>
					</tr>
					<tr>
						<td>Date of Birth *</td>
						<td><input type="date" name="dob" value="<?php echo $row['Date_of_Birth'];?>"/></td>
					</tr>
					<tr>
						<td>Blood group</td>
						<td>
							<select name="bg" value="<?php echo $row['Blood_group'];?>" class="select clear">
								<option >A+</option> 
								<option >B+</option> 
								<option >AB+</option> 
								<option >O+</option> 
								<option >A-</option> 
								<option >B-</option> 
								<option>AB-</option> 
								<option >O-</option> 
							</select>
						</td>
					</tr>
					<tr>
						<td>Gender *</td>
						<td class="radio"><input type="radio" name="gender" value="male" checked> Male</td>
						<td class="radio"><input type="radio" name="gender" value="female" > Female</td>
					</tr>
				
					<tr>
						<td>Email *</td>
						<td><input type="email" name="email" value="<?php echo $row['Email'];?>" /></td>
					</tr>
					<tr>
						<td>Phone number *</td>
						<td><input type="tel" name="phone"  value="<?php echo $row['Phone'];?>"/></td>
					</tr>
					
					<tr class="image clear">
						<td>Picture</td>
						<td >									
							<input type="file" value="<?php echo $row['pic_id'];?>" name="profile_pic" />
						</td>
					</tr>
					
					<tr>
						<td>Present Address </td>
						<td><input type="text" name="prt_address" value="<?php echo $row['Pe_Address'];?>"/></td>
					</tr>
					<tr>
						<td>Permanent Address *</td>
						<td><input type="text" name="pmt_address" value="<?php echo $row['Pr_Address'];?>"/></td>
					</tr>
					<tr>
						<td>Father's name *</td>
						<td><input type="text" name="father_name" value="<?php echo $row['Father_Name'];?>" /></td>
					</tr>
					<tr>
						<td>Mother's name</td>
						<td><input type="text" name="mother_name" value="<?php echo $row['Mother_Name'];?>" /></td>
					</tr>
					<tr>
						<td>Guardian contact no. *</td>
						<td><input type="tel" name="g_phone" value="<?php echo $row['Contact_no'];?>" /></td>
					</tr>
				</table>
				<a class="fa" id="fac_back" href="sprofile.php?id=<?php echo $id?>" >&#xf104;  Back </a>
				<input class="r-submit" type="submit" name="usubmit" value="Update"/>
			</div>
			</form>
		</div>
</section>

<?php
	include "../footer.php";
?>
