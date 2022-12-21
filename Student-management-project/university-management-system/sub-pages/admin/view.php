<?php

	ob_start();

	session_start();

	require "function.php";

	$user = new dbms();

	$id = $_SESSION['aid'];

	$pass = $_SESSION['apass'];

	$n1='';

	

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

<section class="section clear">

	<div class="admin_menu">

		<ul>

			<li><a href="../../index.php">Home</a></li>

			<li><a href="#student_list">Student List</a></li>

			<li><a  href="#faculty_list">Faculty List</a></li>

			<li><a  href="#admin_result">Result</a></li>

			<li><a  href="logout.php">Logout</a></li>

		</ul>

	</div>

	

	<div class="main-section-view clear">	

		<div class="work-here clear">

			

			<div class="according" id="student_list">

				<p>Student list</p>

				<a class="new_insert clear" href = "../student/sregistration.php">Insert New</a>

				

				

				<form class="search_student" action="view.php#search_stu" method="post">

					<input type="search" name="src_id" placeholder="Search student by ID" />

					<input type="submit" value="Search" />

				</form>

				

				<div class="admin_download"><a href="studentlist_pdf.php">Download</a></div>

				<?php 						

					$qry=$user->view_student();

					$i=0;

				?>

				<table class="student_list_table">

					<tr>

						<th >ID</th>

						<th >Name</th>

						<th >Program</th>

						<th >Details</th>

					</tr>

					

					<?php

						while($view=$qry->fetch_assoc()){

					?>

					

					<tr>

						<td><?php echo $view['ID']; ?></td>

						<td><?php echo $view['Name']; ?></td>

						<td><?php echo $view['Program']; ?></td>

						<td ><a class="fa" id="details_student"href='sprofile.php?id=<?php echo $view['ID'];?>'> Details &#xf105;</a></td>

					</tr>

					<?php

						$i++;

						}

					?>

				

				</table>

				

			</div>



			

			<!--faculty list start-->

			<div class="according" id="faculty_list">

				<p>Faculty list</p>

				<a class="new_insert clear" href = "../faculty/fregistration.php">Insert New</a>

				<form class="search_student"action="view.php#search_fac" method="post">

					<input type="search" name="src_fid" placeholder="Search faculty">

					<input type="submit"  value="Search">

				</form>

				

				<div class="admin_download"><a href="facultylist_pdf.php">Download</a></div>

				

				<?php 						

					$qry=$user->view_faculty();

					$i=0;

				?>

				<table class="faculty_list_table">

					<tr>

						<th>ID</th>

						<th >Name</th>

						<th >Department</th>

						<th >Details</th>

					</tr>

					

				<?php

					while($view=$qry->fetch_assoc()){

				?>

				

				<tr>

					<td><?php echo $view['id']; ?></td>

					<td><?php echo $view['name']; ?></td>

					<td><?php echo $view['department']; ?></td>

					<td><a class="fa" id="details_faculty" href='fprofile.php?id=<?php echo $view['id'];?>'> Details &#xf105;</a></td>

				</tr>

				<?php

					$i++;

					}

				?>

				

				</table>

				

				

			</div>

			

			

			<div class="according" id="admin_result">

				<h2>All student result</h2>

				<table>

					<tr>

						<th>SL</th>

						<th>ID</th>

						<th>Name</th>

						<th>Program</th>

						<th>SGPA</th>

						<th>Details</th>

					</tr>

					

				<?php

					$qry = $user->view_student();

					$i=1;

					while($result = $qry -> fetch_assoc()){

						$j=0;

						$n1=0;

						$marks = $user->total_result($result['ID']);

						while($grade = $marks->fetch_assoc()){

							$qryy = $user->view_subject_id($grade['sub_id']);

							$credit = $qryy -> fetch_assoc();

							$total = ($grade['f_t']*(0.2)) + ($grade['m_t']*(0.2)) + ($grade['final']*(0.35)) + ($grade['attendance']*(0.1)) + ($grade['presentation']*(0.05)) + ($grade['quize']*(0.05)) + ($grade['extra']*(0.05));

							

							if($total>=90) {$CGPA='A'; $n1+=4*$credit['credit_h']; $j+=$credit['credit_h'];}

							else if($total>=80) {$CGPA='B'; $n1+=3*$credit['credit_h'];$j+=$credit['credit_h'];}

							else if($total>=70) {$CGPA='C';	$n1+=2*$credit['credit_h'];$j+=$credit['credit_h'];}

							else if($total>=60) {$CGPA='D';	$n1+=1*$credit['credit_h'];$j+=$credit['credit_h'];}

							else if($total<60) {$CGPA='F';	$n1+=0*$credit['credit_h'];$j+=$credit['credit_h'];}

							

							

						}

						if($j>=1){

							$n1/=$j;

						}

						else{

							$n1/1;

						}

	

						

				?>

					

					<tr>

						<td> <?php echo $i;?></td>

						<td> <?php echo $result['ID'];?></td>

						<td> <?php echo $result['Name'];?> </td>

						<td> <?php echo $result['Program'];?> </td>

						<td> <?php echo number_format($n1,2);?> </td>

						<td ><a href='student_full_result.php?s_id=<?php echo $result['ID'];?>&s_name=<?php echo $result['Name'];?> &s_dept=<?php echo $result['Program'];?>'> Full Result </a></td>

					</tr>

					

					

					<?php $i++; }?>

				

				</table>

				

			</div>



			<div class="according" id="search_stu">

				<?php

					if($_SERVER['REQUEST_METHOD']=="POST"){

						$src_id = $_POST['src_id'];

						$result = $user->src_result($src_id);

						$row = $result->num_rows;

					}

					

					if($row>0){

				?>

				

				<div class="src_profile">

					<p>Student list</p>

					<a class="new_insert clear" href = "../student/sregistration.php">Insert New</a>

				

				

					<form class="search_student" action="view.php#search_stu" method="post">

						<input type="search" name="src_id" value="<?php echo $src_id; ?>" />

						<input type="submit" value="Search" />

					</form>

					<table class="student_list_table">

						<tr>

							<th >ID</th>

							<th >Name</th>

							<th >Program</th>

							<th >Details</th>

						</tr>

						<?php

							while($row=$result->fetch_assoc()){

						?>

						

						<tr>

							<td><?php echo $row['ID']; ?></td>

							<td><?php echo $row['Name']; ?></td>

							<td><?php echo $row['Program']; ?></td>

							<td ><a class="fa" id="details_student" href='sprofile.php?id=<?php echo $row['ID'];?>'> Details &#xf105;</a></td>

						</tr>

							<?php } ?>

					</table>

					<?php

						}

						else{

							echo "<span style='color:red;margin-left:352px; font-size:30px;'>$src_id Not found</span>";

						}

					?>

				</div>

				

				

			</div>

			

			<div class="according" id="search_fac">

				<?php

					if($_SERVER['REQUEST_METHOD']=="POST"){

						$src_fid = $_POST['src_fid'];

						$result = $user->fac_src_result($src_fid);

						$row = $result->num_rows;

					}

					

					if($row>0){

				?>

				

				<div class="src_profile">

					<p>Faculty list</p>

					<a class="new_insert clear" href = "../faculty/fregistration.php">Insert New</a>

					<form class="search_student"action="view.php#search_fac" method="post">

						<input type="search" name="src_fid" value="<?php echo $src_fid;?>">

						<input type="submit" value="Search">

					</form>

					<table class="student_list_table">

						<tr>

							<th >ID</th>

							<th >Name</th>

							<th >Program</th>

							<th >Details</th>

						</tr>

						<?php

							while($row=$result->fetch_assoc()){

						?>

						

						<tr>

							<td><?php echo $row['id']; ?></td>

							<td><?php echo $row['name']; ?></td>

							<td><?php echo $row['department']; ?></td>

							<td ><a class="fa" id="details_faculty"href='fprofile.php?id=<?php echo $row['id'];?>'> Details &#xf105;</a></td>

						</tr>

							<?php } ?>

					</table>

					<?php

						}

						else{

							echo "<span style='color:red;margin-left:352px; font-size:30px;'>$src_fid Not found</span>";

						}

					?>

				</div>

				

				

			</div>

			

			

			

		</div >

	</div >

</section>



<?php

	include "../footer.php";

?>

