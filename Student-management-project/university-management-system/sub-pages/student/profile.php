<?php
	ob_start();
	session_start();
	require"function.php";
	$user = new dbms();
	$id = $_SESSION['id'];
	$prog = $_SESSION['prog'];
	$pass = $_SESSION['pass'];
	
	$n1='';$n2='';$n3='';$n4='';$n5='';$n6='';
	
	if(!$user->getsession()){
		header('Location:slogin.php');
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
		
		<title>profile</title>
		
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
		<h2 class="fa"><span style='color:#00ffff;'>&#xf007;</span> <?php echo $result['Name'];?></h2>
	</div>
	
		<section class="section clear">
		<aside class="navigation clear">
		<div class="menu">
			<ul>
				<li><a id="home" class="fa fa-home fa-2x" href="../../index.php"> Home</a></li>
				<li><a  class="fa" href="#profile">&#xf058; Profile</a></li>
				<li><a class="fa" href="#result">&#xf1fd; Result</a></li>
				<li><a class="fa" href="#update">&#xf06b; Edit profile</a></li>
				<li><a class="fa" href="#change_password">&#xf21b; Change Password</a></li>
				<li><a class="fa" href="logout.php">&#xf21b; Logout</a></li>
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
		
		
		
		<div class="work-here clear">
			
			<div class="according" id="profile">
				<?php
					$qry = $user->get($id);
					$result = $qry -> fetch_assoc();
				?>
				
				<div class="sdownload"><a href="profile_pdf.php?id=<?php echo $id;?>" target="_Blank">Download</a></div>
				
				<div class="picture">
					<?php $xxxx = '../../images/profile/'.$result['pic_id'];?>
					<img src="../../images/profile/<?php echo str_replace(' ', '',$xxxx);?>" alt="Photo" style=" font-size:25px;" /><br><br>
				</div>	
				
				<table class="profile-show clear">
					<tr>
						<td>Name</td>
						<td><?php echo ":  ". $result['Name']; ?></td>
					</tr>
					<tr>
						<td>ID</td>
						<td><?php echo ":  ". $id ?></td>
					</tr>
					<tr>
						<td>Program</td>
						<td><?php echo ":  ". $result['Program']; ?></td>
					</tr>
					<tr>
						<td>Date of Birth</td>
						<td><?php echo ":  ". $result['Date_of_Birth']; ?></td>
					</tr>
					<tr>
						<td>Blood Group</td>
						<td><?php echo ":  ". $result['Blood_group']; ?></td>
					</tr>
					<tr>
						<td>Gender</td>
						<td><?php echo ":  ". $result['Gender']; ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo ":  ". $result['Email']; ?></td>
					</tr>
					<tr>
						<td>Phone Number</td>
						<td><?php echo ":  ". $result['Phone']; ?></td>
					</tr>
					<tr>
						<td>Present Address</td>
						<td><?php echo ":  ". $result['Pr_Address']; ?></td>
					</tr>
					<tr>
						<td>Parmanent Address</td>
						<td><?php echo ":  ". $result['Pe_Address']; ?></td>
					</tr>
					<tr>
						<td>Father's name</td>
						<td><?php echo ":  ". $result['Father_Name']; ?></td>
					</tr>
					<tr>
						<td>Mother's name</td>
						<td><?php echo ":  ". $result['Mother_Name']; ?></td>
					</tr>
					<tr>
						<td>Contact Number</td>
						<td><?php echo ":  ". $result['Contact_no']; ?></td>
					</tr>
				</table>
										
			</div>
			
			
			<div class="according" id="result">
				<div id="stu_result_download" class="result_download"><a href="result_pdf.php?id=<?php echo $id;?>" target="_Blank">Download</a></div>
				
				<div class="result_out">
					<h2>Semester Final Result</h2>
					<div class="information">
						<?php
							$qry = $user->get($id);
							$result = $qry -> fetch_assoc();
						?>
						<table>
							<tr>
								<th>Personal Information</th>
							</tr>
							<tr>
								<td>Name : <?php echo $result['Name'];?></td>
							</tr>
							<tr>
								<td>ID : <?php echo $result['ID'];?></td>
							</tr>
							<tr>
								<td>Department : <?php echo $result['Program'];?></td>
							</tr>
					
						</table>
						
					</div>
					
					
				<div class="cgpa">
					<table>
					<tr>
						<th>Subject</th>
						<th>Credit hour</th>
						<th>Marks</th>
						<th>Grade</th>
					</tr>
					
					<?php
						$qry = $user->result($id);
						$i=1;
						$n1=0;
						$j=0;
						while($grade = $qry -> fetch_assoc()){
							$qryy = $user->view_subject_id($grade['sub_id']);
							$credit = $qryy -> fetch_assoc();
							$total = ($grade['f_t']*(0.2)) + ($grade['m_t']*(0.2)) + ($grade['final']*(0.35)) + ($grade['attendance']*(0.1)) + ($grade['presentation']*(0.05)) + ($grade['quize']*(0.05)) + ($grade['extra']*(0.05));
							
							if($total>=90) {$CGPA='A'; $n1+=4*$credit['credit_h']; $j+=$credit['credit_h'];}
							else if($total>=80) {$CGPA='B'; $n1+=3*$credit['credit_h'];$j+=$credit['credit_h'];}
							else if($total>=70) {$CGPA='C';	$n1+=2*$credit['credit_h'];$j+=$credit['credit_h'];}
							else if($total>=60) {$CGPA='D';	$n1+=1*$credit['credit_h'];$j+=$credit['credit_h'];}
							else if($total<60) {$CGPA='F';	$n1+=0*$credit['credit_h'];$j+=$credit['credit_h'];}

					?>
							
					<tr>
						<td><?php echo $grade['sub_id'];?></td>
						<td><?php echo $credit['credit_h'];?></td>
						<td><?php echo $total;?></td>
						<td><?php echo $CGPA ;?></td>
					</tr>
					<?php 
						$i++;
						}
					?>
					</table>
					</div>
					
					<div class="sgpa">SGPA =
						<?php
							if($j<=1){
			
								$n1/=1;
							}
							else{
								$n1/=$j;
							}
							echo number_format($n1,2);
						?>
						
					</div>	
					
					
				</div>
				
				
			</div>
			
			
			
			<div class="according" id="update">
				
				<?php
					if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['usubmit']) &&  isset($_FILES['profile_pic'])){
						$name = $_POST['name'];
						$prog = $_POST['prog'];
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
						move_uploaded_file($filetmp,"../../images/profile/$filename");
						
						$permanent_add = $_POST['pe_add'];
						$father_n = $_POST['father_name'];
						$mother_n = $_POST['mother_name'];
						$contact = $_POST['g_phone'];
						
						if(empty($name) or empty($prog) or empty($dob) or empty($email) or empty($phone) or empty($permanent_add) or empty($father_n) or empty($contact) or empty($filename)){
							if(isset($_POST['usubmit'])){
								echo"<span style='color:red'>You must have to fill up all those * marks filed.</span><br>";
							}
						}
						else{
							$update = $user->userupdate($id, $name , $prog ,  $bg  ,  $dob  ,  $email,$phone  ,  $permanent_add  ,  $father_n  ,  $mother_n  ,  $contact,$filename);
							//$update = $user->userupdate($id ,$father_n );
							if($update){
								echo"<span style='color:#009900;font-weight:bold; margin-left: color:#009900;font-weight:bold; margin-left:180px;'>Update successfully !</span><br>";
								}
							else{
								echo "not";
								}
							}
							
						}
					?>
				<?php
					$result = $user->get($id);
					$row = $result->fetch_assoc();
				?>
			
				<span class="profile_headding">Update Your Profile</span>
			
				<form action="" method="post" name="rag" enctype="multipart/form-data">
					<div class="stu_update clear">
						<table >
							<tr>
								<td>ID *</td>
								<td><input type="text" name="id" value="<?php echo $row['ID'];?>" readonly/></td>
							</tr>
							<tr>
								<td>Name *</td>
								<td><input type="text" name="name" value="<?php echo $row['Name'];?>" /></td>
							</tr>
							<tr>
								<td>Program *</td>
								<td>
									<select name="prog" class="select clear" selected="<?php echo $row['Program'];?>">
										<option   >BCSE</option> 
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
								<td>Permanent Address *</td>
								<td><input type="text" name="pe_add" value="<?php echo $row['Pe_Address'];?>"/></td>
							</tr>
							<tr>
								<td>Father's name *</td>
								<td><input type="text" name="father_name" value="<?php echo $row['Father_Name'];?>"/></td>
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
						<input class="r-submit" type="submit" name="usubmit" value="Update"/>
					</div>
				</form>
			</div>
			
				
			<div class="according" id="change_password">
				<?php
					if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['submit'])){
						$old_pass = $_POST['old_pass'];
						$new_pass = $_POST['new_pass'];
						$confirm_pass = $_POST['confirm_pass'];
						if(empty($old_pass) or empty($new_pass) or empty($confirm_pass)){
							if(isset($_POST['submit'])){
							echo"<span style='color:red; margin-left:200px;'>You must have to fill up all those * marks filed.</span><br>";
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
								echo"<span style='color:#009900;font-weight:bold; margin-bottom:5px;'>Update successfully !You need to login first.</span><br>";
								$user->logout();
								header("refresh:2; url=slogin.php");
								ob_end_flush();
							}
						}
					}
					
				?>
				<span class="pass_headding">Change Password</span>
			
				<div class="stu_pass">
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
						<input class="cpass-submit" type="submit"  name="submit" value="Update"/>
					</form>
				</div>
			</div>
			
		</div >
	</div >
</section>

<?php
	include "../footer.php";
?>