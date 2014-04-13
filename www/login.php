<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<meta charset="utf-8">
	<title>GreenMars :: Login</title>
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
					<a href='#'>GreenMars :: Login</a>
				</div>
			</div>
		</nav>
	</header>
		<div class='container'>
			<div class='sixteen columns form'>
				<h3>Please login:</h3>
				<p>
					<?php
						if (isset($_GET["login"])){
						if ($_GET["login"] == "invalid"){
							echo "Please enter a valid username and password.";
						}else if ($_GET["login"] == "login"){
							echo "You must login to enter this site.";
						}else{
							echo "Enter the login details for the administration user.";
						}}
					?>
				</p>
				<form action="do_login.php" method="post">
					<label>Username:</label>
					<input type='text' name='username' placeholder='Your username.'>
					<label>Password:</label>
					<input type='password' name='password' placeholder='Your password.'>
					<input type='submit' value='Login'>
				</form>
			</div>
		</div>


		<div class='clear'></div>


		<div class='eight columns'>
			<h4></h4>
			<p></p>
		</div>

		<div class='eight columns'>
			<h4></h4>
			<p></p>
		</div>
	</div>
</body>
</html>