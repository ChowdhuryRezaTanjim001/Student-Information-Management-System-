<?php
ob_start();
	require"function.php";
	$user = new dbms();
	session_start();
	if($user->getsession()){
		header('Location:next.php');
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
			.main-work-section{margin:40px;}
			.main-work-section p{ background-color: cadetblue; color: #ffffff; font-size: 23px; font-weight: bold; text-align: center;}
			.work-here{border-color: #4caf50; border-image: none; border-style: solid; border-width: 1px 1px 29px; height: 295px; margin-left: 208px; margin-right: 208px; margin-top: 50px; width: 499px;}
			.work-here h3{ background-color: #4caf50; color: white; font-size: 21px; font-weight: bold; padding: 3px; text-align: center;}
			.work-here form { width: 459px;}
			.table{margin: 19px;}
			.table,tr,td{  border: 1px solid #e2d9dc; border-collapse: collapse; font-weight: bold; letter-spacing: 1.5px; padding: 8px 28px 8px 14px;}
			.table input[type="text"], .table input[type="password"],.select{border: 1px solid #b4b4b4; height: 36px; padding-left: 10px; width: 341px;}
			.work-here>form>input[type="submit"]{float:right; background-color: #4caf50; margin-right: -18px; border: 0 none; color: white; padding: 5px 9px; display:block;}
			.work-here>form>input[type="submit"]:hover{ background-color:#fff; border:1px solid #4caf50; color: #4caf50; display:block;}
			.work-here>a{ background-color:#fff;  border:1px solid #CCCCCC; color: #000000; display: block; font-size: 18px;  float: left;  margin-left: 21px;  padding: 3px 4px;}
			.work-here>a:hover{text-decoration:none; box-shadow: -1px 5px 8px 5px #aaaaaa; display:block;}
		</style>
		
	</head>
	
<?php
	include "../header.php";
?>
<section class="section clear">	
	<div class="main-work-section clear">
		<p id="demo"></p>
		<script type="text/javascript">						
			var d = new Date();
			var n = d.toLocaleString();
			document.getElementById("demo").innerHTML = n;
		</script>
		
		<?php
			if($_SERVER['REQUEST_METHOD']=='POST'){
				$id = $_POST['id'];
				$dept = $_POST['dept'];
				$pass = $_POST['pass'];
				
				if(empty($id) or empty($dept) or empty($pass)){
					echo "Field must not blank.";
				}
				else{
					
					$login = $user->loginuser($id,$dept,$pass);
					if($login){
						header('Location: next.php');
						ob_end_flush();
					}
					else{
						echo "id, password or program not match ...";
					}
				}
			}
		
		?>
		
		<div class="work-here clear">
			<h3>Login</h3>
			<form action="#" method="post">
				<table class="table clear">
					<tr>
						<td>User ID</td>
						<td><input type="text" name="id" placeholder="User ID" /></td>
					</tr>
					<tr>
						<td>Department</td>
						<td>
							<select name="dept" class="select clear">
								<option  value="BCSE">BCSE</option> 
								<option value="BCSE">BSEEE</option> 
								<option value="BCSE">BSME</option> 
								<option value="BCSE">BSAg</option> 
								<option value="BCSE">BATHM</option> 
								<option value="BCSE">BSCE</option> 
								<option value="BCSE">BBA</option> 
							</select>
						</td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="pass" placeholder="******" /></td>
					</tr>

				</table>
				<input type="submit" name="submit" value="Login" />
			</form>
			<a class="fa" href="../../index.php" >&#xf104;  Home </a>
		</div >
	</div>
</section>
			

<?php
	include "../footer.php";
?>
