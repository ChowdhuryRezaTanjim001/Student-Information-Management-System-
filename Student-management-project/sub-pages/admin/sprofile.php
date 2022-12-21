<?php
	ob_start();
	session_start();
	require"function.php";
	$user = new dbms();
	$id = $_SESSION['aid'];
	$pass = $_SESSION['apass'];
	
	if(!$user->getsession()){
		header('Location:alogin.php');
		exit();
	}
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
			.header-right{margin-right:-10000px;}
		</style>
		
	</head>
	
<?php
	include "../header.php";
?>
<section class="section clear">	
	<div class="main-profile-section clear">
		<p id="demo"></p>
		<script type="text/javascript">						
			var d = new Date();
			var n = d.toLocaleString();
			document.getElementById("demo").innerHTML = n;
		</script>
			<?php
				$qry = $user->get($_GET['id']);
				$result = $qry -> fetch_assoc();
			?>
			
			<div class="as_download"><a href="../student/profile_pdf.php?id=<?php echo $result['ID']?> " target="_Blank">Download</a></div>
			
			<div class="admin_picture">
				<?php $xxxx = '../../images/profile/'.$result['pic_id'];?>
				<img src="../../images/profile/<?php echo str_replace(' ', '',$xxxx);?>" alt="Photo" style=" font-size:25px;" /><br><br>
			</div>	
			
			
			<table class="profile-show-student clear">
				<tr>
					<td>Name</td>
					<td><?php echo ":  ". $result['Name']; ?></td>
				</tr>
				<tr>
					<td>ID</td>
					<td><?php echo ":  ". $result['ID']; ?></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><?php echo ":  ". $result['password']; ?></td>
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
			<a class="fa" id="stu_back" href="view.php#student_list" >&#xf104;  Back to List </a>
			<a id= "stu_edit" href='editstu.php?id=<?php echo $result['ID'];?>'> Edit</a>
			<a id="st_delete" href='sdelete.php?id=<?php echo $result['ID'];?>'> Delete</a>
		</div >
	</div>
</section>
			

<?php
	include "../footer.php";
?>
