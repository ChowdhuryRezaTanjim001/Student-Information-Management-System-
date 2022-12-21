<?php
	ob_start();
	session_start();
	require"function.php";
	$user = new dbms();
	$id = $_SESSION['aid'];
	$pass = $_SESSION['apass'];
	$n1='';
	
	if(!$user->getsession()){
		header('Location:alogin.php');
		exit();
	}
	$id=$_GET['s_id'];
	$name=$_GET['s_name'];
	$dept=$_GET['s_dept'];
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		
		<title>Admin Panel</title>
		
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

	<div class="result_download"><a href="result_pdf.php?id=<?php echo $id;?>" target="_Blank">Download</a></div>
	
	<div class="admin_details_result">

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
						<td>Name : <?php echo $_GET['s_name'];?></td>
					</tr>
					<tr>
						<td>ID : <?php echo $_GET['s_id'];?></td>
					</tr>
					<tr>
						<td>Department : <?php echo $_GET['s_dept'];?></td>
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
						$n1/1;
					}
					else
					$n1/=$j;
		
					echo number_format($n1,2);
				?>
				
			</div>
			<div class="back_to_admin">
				<a href="view.php#admin_result">Back</a>
			</div>
			
		</div>	
	</div>
	
			
	<?php
		include "../footer.php";
	?>
			