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
			$check = $user->check_attendance($sub_id,$date);
			$marks=$check->fetch_assoc();
									
			if (($marks['sub_id'] == $sub_id) && ($marks['date'] == $date)){
				echo "<span style='padding:10px;background-color:#9fdf9f;'>Attendance has taken today.</span>";
				
			?>
			
			<a class="att_view" href="edit.php?select_sub=<?php echo $sub_id ; ?>&date=<?php echo $date ; ?>" >View</a>
			
				<?php 		
					}
			else{
				$qry=$user->view_student();
				$i=1;
			?>
				<form action="" method="post">
					<table id="student_att" class="student_att_table">
						<tr>
							<th >Sl</th>
							<th >ID</th>
							<th >Name</th>
							<th class="select_present">Present</th>
						</tr>
						
						
					
						<?php
							while($view=$qry->fetch_assoc()){
								
								if($_SERVER['REQUEST_METHOD']=="POST"){
									
								
									$status = $_POST[$view['ID']];
									
									
										
									$attendance = $user->student_present($view['ID'],$sub_id,$status,$date);
									if($attendance)
									header('refresh:0');
								}
						?>
							
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $view['ID']; ?></td>
							<td><?php echo $view['Name']; ?></td>
							<td class="select_present">
								<select name="<?php echo $view['ID'];?>">
									<option>A</option>
									<option>P</option>
								</select>
							</td>
						</tr>
						
						<?php
							$i++;
						}
				

						?>
			
					</table>
					<input class="att_submit" type="submit" name="submit" value="Submit" />
				<?php } ?>
					
					<span class="xback"><a href="next.php">Back</a></span>
				</form>
			</div>
		
		
	</div>
	
</section>


			

<?php
	include "../footer.php";
?>