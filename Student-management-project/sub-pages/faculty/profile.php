<?php
	ob_start();
	session_start();
	require"function.php";
	$user = new dbms();
	$id = $_SESSION['fid'];
	$prog = $_SESSION['fprog'];
	$pass = $_SESSION['fpass'];
	
	if(!$user->getsession()){
		header('Location:flogin.php');
		exit();
	}
	$qry = $user->get($id);
	$result = $qry -> fetch_assoc();
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		
		<title>Profile</title>
		
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

<div class="fxxx">
	<h2 class="fa"><span style='color:#00ffff;'>&#xf007;</span> <?php echo $result['name'];?></h2>
</div>
	
<section class="section clear">
	<div class="admin_menu">
			<ul>
				<li><a href="../../index.php">Home</a></li>
				<li><a href="#fprofile">Profile</a></li>
				<li><a  href="../grade/next.php">Submit Grade</a></li>
				<li><a  href="#fupdate"> Edit profile</a></li>
				<li><a  href="#fchange_password">Change Password</a></li>
				<li><a  href="logout.php">Logout</a></li>
			</ul>
	</div>
	
	<div class="main-section-view clear">
		<p id="demo"></p>

		<div class="work-here clear">
			<div class="according" id="fprofile">
				<?php
					$qry = $user->get($id);
					$result = $qry -> fetch_assoc();
				?>
				
				<div class="download"><a href="fprofile_pdf.php?id=<?php echo $id;?>" target="_Blank">Download</a></div>
				
				<div class="picture">
					<?php $xxxx = '../../images/fprofile/'.$result['fpic_id'];?>
					<img src="../../images/fprofile/<?php echo str_replace(' ', '',$xxxx);?>" alt="Photo" style=" font-size:25px;" /><br><br>
				</div>	
				
				
				<table class="profile-show clear">
					<tr>
						<td>Name</td>
						<td><?php echo ":  ". $result['name']; ?></td>
					</tr>
					<tr>
						<td>ID</td>
						<td><?php echo ":  ". $id ?></td>
					</tr>
					<tr>
						<td>Department</td>
						<td><?php echo ":  ". $result['department']; ?></td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><?php echo ":  ". $result['dob']; ?></td>
					</tr>
					<tr>
						<td>Blood Group</td>
						<td><?php echo ":  ". $result['bg']; ?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><?php echo ":  ". $result['gender']; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo ":  ". $result['email']; ?></td>
					</tr>
					<tr>
						<td>Phone Number</td>
						<td><?php echo ":  ". $result['p_number']; ?></td>
					</tr>
					<tr>
						<td>Present Address</td>
						<td><?php echo ":  ". $result['prt_address']; ?></td>
					</tr>
					<tr>
						<td>Parmanent Address</td>
						<td><?php echo ":  ". $result['pmt_address']; ?></td>
					</tr>
				</table>
										
			</div>
			<div class="according" id="fresult">
				<tr>
					<td>kdsggdkf</td>
				</tr>
			</div>
			
			
			<div class="according" id="fupdate">
			
				<?php
				if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['usubmit'])){
					$name = $_POST['name'];
					$dept = $_POST['dept'];
					$dob = $_POST['dob'];
					$bg = $_POST['bg'];
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
					move_uploaded_file($filetmp,"../../images/fprofile/$filename");
					
					$permanent_add = $_POST['pmt_address'];
					$prt_address = $_POST['prt_address'];
					
					if(empty($name) or empty($dept) or empty($dob) or empty($email) or empty($phone) or empty($permanent_add) ){
						if(isset($_POST['submit'])){
							echo"<span style='color:red'>You must have to fill up all those * marks filed.</span><br>";
						}
					}
					else{
						$update = $user->userupdate($id, $name , $dept ,  $bg  ,  $dob  ,  $email, $phone  ,  $permanent_add  ,$prt_address, $filename);
						//$update = $user->userupdate($id ,$father_n );
						if($update){
							echo"<span style='color:#009900;font-weight:bold; margin-left: 168px;'>Update successfully !</span><br>";
						}
					}
				}
			?>
			<?php
				$result = $user->get($id);
				$row = $result -> fetch_assoc();
			?>
			<span class="profile_headding">Update Your Profile</span>
			
			<form action="" method="post" name="rag" enctype="multipart/form-data">
			<div class="stu_update clear">
				<table >
					<tr>
						<td>ID *</td>
						<td><input type="text" name="id" value="<?php echo $id;?>" readonly/></td>
					</tr>
					<tr>
						<td>Name *</td>
						<td><input type="text" name="name" value="<?php echo $row['name'];?>" /></td>
					</tr>
					<tr>
						<td>Department *</td>
						<td>
							<select name="dept" class="select clear" selected="<?php echo $row['department'];?>">
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
						<td>Date of Birth *</td>
						<td><input type="date" name="dob" value="<?php echo $row['dob'];?>"/></td>
					</tr>
					<tr>
						<td>Blood group</td>
						<td>
							<select name="bg" value="<?php echo $row['bg'];?>" class="select clear">
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
						<td>Email *</td>
						<td><input type="email" name="email" value="<?php echo $row['email'];?>" /></td>
					</tr>
					<tr>
						<td>Phone number *</td>
						<td><input type="tel" name="phone"  value="<?php echo $row['p_number'];?>"/></td>
					</tr>
					<tr class="image clear">
						<td>Picture</td>
						<td >									
							<input type="file" value="<?php echo $row['fpic_id'];?>" name="profile_pic" />
						</td>
					</tr>

					<tr>
						<td>Present Address </td>
						<td><input type="text" name="prt_address" value="<?php echo $row['prt_address'];?>"/></td>
					</tr>
					<tr>
						<td>Permanent Address *</td>
						<td><input type="text" name="pmt_address" value="<?php echo $row['pmt_address'];?>"/></td>
					</tr>
				</table>
				<input class="r-submit" type="submit" name="usubmit" value="Update"/>
			</div>
			</form>
		</div>
				
			<div class="according" id="fchange_password">

				<?php
					if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){
						$old_pass = $_POST['old_pass'];
						$new_pass = $_POST['new_pass'];
						$confirm_pass = $_POST['confirm_pass'];
						if(empty($old_pass) or empty($new_pass) or empty($confirm_pass)){
							if(isset($_POST['submit'])){
							echo"<span style='color:red'>You must have to fill up all those * marks filed.</span><br>";
							}
						}
						else if($old_pass != $pass){
							if(isset($_POST['submit'])){
							echo"<span style='color:red'>Invalid Old password</span><br>";
							}
						}
						else if($confirm_pass != $new_pass){
							if(isset($_POST['submit'])){
							echo"<span style='color:red'>New Password not matched</span><br>";
							}
						}
						
						else{
							
							$passupdate = $user->updatepassword($id,$new_pass,$old_pass);
							if($passupdate){
								echo"<span style='margin-left:200px;color:#009900;font-weight:bold; margin-bottom:5px;'>Update successfully !You need to login first.</span><br>";
								$user->logout();
								header("refresh:2; url=flogin.php");
								ob_end_flush();
							}
						}
					}
					
				?>
				<span class="fpass_headding">Change Password</span>
				
				<div class="ftu_pass">
					<form action="" method="post" name="rag">
						<table class="reg-table clear">
							<tr>
								<td>Old Password *</td>
								<td><input type="password" name="old_pass" placeholder="old password"/></td>
							</tr>
							<tr>
								<td>New Password *</td>
								<td><input type="password" name="new_pass" placeholder="New password"/></td>
							</tr>
							<tr>
								<td>Confirm *</td>
								<td><input type="password" name="confirm_pass" placeholder="Confirm password"/></td>
							</tr>
						</table>
						<input class="r-submit" type="submit"  name="submit" value="Update"/>
					</form>
				</div>
			</div>
			
		</div >
	</div >
</section>

<?php
	include "../footer.php";
?>
