<?php
ob_start();
	require"function.php";
	$user = new dbms();
	session_start();
	if(!($user->getsession())){
		header('Location:flogin.php');
		exit();
	}
	$id = $_SESSION['fid'];
	$name = $_SESSION['fname'];
	$sub_id = $_GET['select_sub'];
	$date = $_GET['date'];
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
		
		
		
	</head>
	
<?php
	include "../header.php";
?>
<div class="main_logout">
	<span><a href="logout.php">Logout</a></span>
</div>

<section class="section clear">	
	<div class="student_attendance clear">
		<p id="demo"></p>
		<script type="text/javascript">						
			var d = new Date();
			var n = d.toLocaleString();
			document.getElementById("demo").innerHTML = n;
		</script>
		
	
		
		<div id="attendance_sheet">
				<table class="faculty_profile">
					<tr>
						<td>Faculty Name:</td>
						<td><?php echo $name ;?></td>
					</tr>
					<tr>
						<td>Subject:</td>
						<td><?php echo $sub_id ;?></td>
					</tr>
					<tr>
						<td>Date:</td>
						<td><?php echo $date; ?></td>
					</tr>
				</table>
				
				<?php
				
				?>
				
				
				
				
				<?php 
					$qry=$user->distinkt_date($sub_id);
					$i=1;
					
				?>
				
					<table id="student_att" class="student_att_list">
						<tr>
							<th >Sl</th>
							<th >Attendance Date</th>
							<th >Action</th>
						</tr>
				<?php
					while($view=$qry->fetch_assoc()){
				?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $view['date']; ?></td>
							<td ><a href='edit_main.php?date=<?php echo $view['date'];?>&select_sub=<?php echo $sub_id;?>'> View </a></td>
						</tr>
						
						<?php
							$i++;
						}
				

						?>
			
					</table>
					<span class="xback"><a href="main.php?select_sub=<?php echo $sub_id;?>&date=<?php echo $date;?>">Back</a></span>
				
		

		
		</div>
		
		
	</div>
	
</section>


			

<?php
	include "../footer.php";
?>