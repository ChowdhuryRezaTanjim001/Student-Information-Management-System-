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
		
		<title>Login</title>
		
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
				$qry = $user->getfaculty($_GET['id']);
				$result = $qry -> fetch_assoc();
			?>
			
			<div class="as_download"><a href="../faculty/fprofile_pdf.php?id=<?php echo $result['id']?>" target="_Blank">Download</a></div>
			
			<div class="admin_picture">
				<?php $xxxx = '../../images/fprofile/'.$result['fpic_id'];?>
				<img src="../../images/fprofile/<?php echo str_replace(' ', '',$xxxx);?>" alt="Photo" style=" font-size:25px;" /><br><br>
			</div>
			
			<table class="profile-show-student clear">
				<tr>
					<td>Name</td>
					<td><?php echo ":  ". $result['name']; ?></td>
				</tr>
				<tr>
					<td>ID</td>
					<td><?php echo ":  ". $result['id']; ?></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><?php echo ":  ". $result['password']; ?></td>
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
			<a class="fa" id="stu_back" href="view.php#faculty_list" >&#xf104;  Back to List </a>
			<a id="stu_edit" href='editfac.php?id=<?php echo $result['id']?>'> Edit</a>
			<a id="st_delete" href='fdelete.php?id=<?php echo $result['id']?>'> Delete</a>
		</div >
	</div>
</section>
			

<?php
	include "../footer.php";
?>
