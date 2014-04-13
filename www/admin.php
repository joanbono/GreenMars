<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<?php
		if (!($_COOKIE["user_login"]=="true")){
			header( 'Location: login.php?login=login' ) ;
		}
	?>
	<meta charset="utf-8">
	<title>GreenMars :: Admin</title>
	<meta name="description" content="GreenMars">
    <meta http-equiv="X-UA-Compatible" content="IE=9" />

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
  	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/base.css">
	<link rel="stylesheet" href="css/skeleton.css">
	<link rel="stylesheet" href="css/layout.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body>
	<header>			
		<nav>
			<div class='container'>
				<div class='five columns logo'>
					<a href='#'>GreenMars :: Admin</a>
				</div>

				<div class='eleven columns'>
					<ul class='mainMenu'>
						<li><a href='index.php' title='Home'>Home</a></li>
						<li><a href='admin.php' title='Admin'>Admin</a></li>
						<li><a href='logout.php' title='Logout'>Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<div class='orange'>

		<div class='container'>
			<h1>Admin</h1><br/>
			<a href="reset_sensors.php?go=true">RESET DATABASE</a><br/><br/>
			<a href="reset_log.php?go=true">RESET LOG</a><br/><br/>
		</div>
	</div>
</body>
</html>