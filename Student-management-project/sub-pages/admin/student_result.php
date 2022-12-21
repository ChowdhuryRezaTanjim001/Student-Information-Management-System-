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
		
		
		<div id="">
				<div class="result_out">
					<h2>Semester Final Result</h2>
					<div class="information">
						<?php
						$s_id = $_GET['s_id'];
							$qry = $user->get($s_id);
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
								<th>Marks</th>
								<th>Grade</th>
							</tr>
							
							<?php
								$qry = $user->total_result($s_id);
								$i=1;
								$n1=0;
								while($grade = $qry -> fetch_assoc()){
									$total = ($grade['f_t']*(0.2)) + ($grade['m_t']*(0.2)) + ($grade['final']*(0.35)) + ($grade['attendance']*(0.1)) + ($grade['presentation']*(0.05)) + ($grade['quize']*(0.05)) + ($grade['extra']*(0.05));
									
									if($total>=90) {$CGPA='A'; $n1+=4;}
									else if($total>=80) {$CGPA='B'; $n1+=3;}
									else if($total>=70) {$CGPA='C';	$n1+=2;}
									else if($total>=60) {$CGPA='D';	$n1+=1;}
									else if($total<60) {$CGPA='F';	$n1+=0;}

							?>
									
							<tr>
								<td><?php echo $grade['sub_id'];?></td>
								<td><?php echo round( $total, 2, PHP_ROUND_HALF_UP);?></td>
								<td><?php echo $CGPA ;?></td>
							</tr>
						<?php 
							$i++;
							}
						?>
						</table>
					</div>
					
					<span>SGPA =
						<?php
							if ($i>=2){
								$n1/=($i-1);
								}
							else{
								$n1/=$i;
								}
							echo number_format($n1,2);
						?>
					</span>
					
				</div>
				
				
			</div>
			
		
			
	</div>
</section>
			

<?php
	include "../footer.php";
?>
