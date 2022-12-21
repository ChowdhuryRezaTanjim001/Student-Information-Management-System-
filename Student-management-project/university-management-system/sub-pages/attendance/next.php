<?php
ob_start();
	require"function.php";
	$user = new dbms();
	session_start();
	if(!($user->getsession())){
		header('Location:main.php');
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
		
	
		
		
	</head>
	
<?php
	include "../header.php";
?>
<div class="main_logout">
	<span><a href="logout.php">Logout</a></span>
</div>
<section class="section clear">	
	<div class="attendance_select clear">
		<p id="demo"></p>
		<script type="text/javascript">						
			var d = new Date();
			var n = d.toLocaleString();
			document.getElementById("demo").innerHTML = n;
		</script>
		<?php
			
		?>
		<form class="select_subject" action="main.php" method="get">
			<input type="date" name="date" required />
			<select name="select_sub">
				<?php
					$qry=$user->view_subject();
					$i=1;
					while($result=$qry->fetch_assoc()){
				?>
					<option><?php echo $result['sub_id'];?></option>
					<?php $i++; }?>
			</select>
			<input type="submit" value="submit">
			
		</form>
	</div>
</section>
<span class="next_back"><a href="../../index.php">Back</a></span>
			

<?php
	include "../footer.php";
?>