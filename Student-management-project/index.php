<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>University Management System</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/bootstrap.min.css">	
		<link rel="stylesheet" href="css/slicknav.css">
		<link rel="stylesheet" href="css/normalize.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/responsive.css">
		<script src="js/vendor/modernizr-2.8.3.min.js"></script>
		
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

		<!--my coding start from here -->
		
		<div class="wrapper clear">
	
			<header class="header clear">
				<div class="header-left clear">
					<h2>University Management System</h2>
				</div>
				<div class="header-right clear">
					<form>
						<input type="search" name="src" value="search here" />
						<i><input class="fa" type="submit" value="&#xf002;" /></i>
					</form>
				</div>
			</header>
			
			<section class="section clear">
				<aside class="navigation clear">
					<div class="menu">
						<ul>
							<li><a id="home" class="fa fa-home fa-2x" href="#"> Home</a></li>
							
							<li class="sub-menu"><a class="fa" href="#">&#xf19d; Student <span id="active">&#xf0d8;</span><p>&#xf0d7;</p></a>
								<ul>
									<li><a href="sub-pages/student/sregistration.php"><i class="fa">&#xf0da; Student Registration</i></a></li>
									<li><a href="sub-pages/student/slogin.php"><i class="fa">&#xf0da; Student Login</i></a></li>
								</ul>
							</li>
							
							<li class="sub-menu"><a class="fa" href="#">&#xf007; Faculty<span id="active">&#xf0d8;</span><p>&#xf0d7;</p></a>
								<ul>
									<li><a href="sub-pages/faculty/fregistration.php"><i class="fa">&#xf0da; Faculty Registration</i></a></li>
									<li><a href="sub-pages/faculty/flogin.php"><i class="fa">&#xf0da; Faculty Login</i></a></li>
								</ul>
							</li>
							
							<li><a class="fa" href="sub-pages/attendance/attendance.php">&#xf0a9; Class Attendance</a></li>
								
							</li>
							<li><a class="fa" href="sub-pages/admin/alogin.php">&#xf21b; Director Admin</a></li>
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
					<img src="images/banner.jpg" />
					<h3>University Management System</h3>
					

				</div >
			</section>
			
			<footer class="main-footer clear">
				<div class="footer-left clear">
					<p>University Management System</p>
				</div>
				<div class="footer-right clear">
					<p>CSE311 Project</p>
				</div>
			</footer>
			
		</div>
		
		

		<script src="js/vendor/jquery-1.12.0.min.js"></script>
		<script src="js/plugins.js"></script>
		<script src="js/jquery.slicknav.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.fitvids.js"></script>
		<script src="js/main.js"></script>
		<script type="text/javascript">
			$(document).ready(function(e){
				$('.sub-menu').click(function(){
					$(this).toggleClass('tap');
				});
			});
		
		</script>

	</body>
</html>
