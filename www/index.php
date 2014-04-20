<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link href='http://fonts.googleapis.com/css?family=Josefin+Sans:100,400' rel='stylesheet' type='text/css'>	
<!-- 	<script type="text/javascript" src="http://www.queness.com/js/bsa.js"></script>	 -->
	<link rel="stylesheet" href="css/styles.css" />

</head>
<body>

<header>
	<h1>Green Mars</h1>
</header>

<?php
	include 'functions.inc.php'; 
	$con=connect_db();
?>

<div class="container">
		
	<div class="hex hex-trans">	
		<div class="corner-1"></div>
		<div class="corner-2"></div>		
	</div>
	
	<div class="hex hex-<?php echo check_status($con, "1") ?>">		
		<a href="cell.php?id=1"></a>
		<h2>CELL1</h2>
		<h3>STATUS: <?php echo check_status($con, "1")?></h3>
		<div class="corner-1"></div>
		<div class="corner-2"></div>		
	</div>
	
	<div class="hex hex-<?php echo check_status($con, "2") ?>">			
		<a href="cell.php?id=2"></a>
		<h2>CELL2</h2>
		<h3>STATUS: <?php echo check_status($con, "2")?></h3>		
		<div class="corner-1"></div>
		<div class="corner-2"></div>		
	</div>
	
	<div class="hex hex-trans">				
		<div class="corner-1"></div>
		<div class="corner-2"></div>		
	</div>
	
	<div class="hex hex-gap-<?php echo check_status($con, "6") ?>">		
		<a href="cell.php?id=6"></a>
		<h2>CELL6</h2>
		<h3>STATUS: <?php echo check_status($con, "6")?></h3>
		<div class="corner-1"></div>
		<div class="corner-2"></div>		
	</div>
	
	<div class="hex hex-<?php echo check_status($con, "0") ?>">		
		<a href="cell.php?id=0"></a>
		<h2>HABITAT</h2>
		<h3>STATUS: <?php echo check_status($con, "0")?></h3>		
		<div class="corner-1"></div>
		<div class="corner-2"></div>		
	</div>
	
	<div class="hex hex-<?php echo check_status($con, "3") ?>">		
		<a href="cell.php?id=3"></a>
		<h2>CELL3</h2>
		<h3>STATUS: <?php echo check_status($con, "3")?></h3>		
		<div class="corner-1"></div>
		<div class="corner-2"></div>		
	</div>	
	
	<div class="hex hex-trans">				
		<div class="corner-1"></div>
		<div class="corner-2"></div>		
	</div>
	
	<div class="hex hex-<?php echo check_status($con, "5") ?>">		
		<a href="cell.php?id=5"></a>
		<h2>CELL5</h2>
		<h3>STATUS: <?php echo check_status($con, "5")?></h3>	
		<div class="corner-1"></div>
		<div class="corner-2"></div>		
	</div>	
	
	<div class="hex hex-<?php echo check_status($con, "4") ?>">		
		<a href="cell.php?id=4"></a>
		<h2>CELL4</h2>
		<h3>STATUS: <?php echo check_status($con, "4")?></h3>		
		<div class="corner-1"></div>
		<div class="corner-2"></div>		
	</div>
	
	<div class="hex hex-trans">				
		<div class="corner-1"></div>
		<div class="corner-2"></div>		
	</div>										

</div>

</body>
</html>