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


<div class="container">
	
	<?php
		include 'functions.inc.php';
		$cell_id = $_GET["id"];
		$con = connect_db();
	 ?>

	<div id="box-0" class="box">
		<h1>
			<?php
				if( $cell_id != 0 ) echo "Cell " . $cell_id;
				else echo "Habitat";
			?>
		</h1>
		<p><?php
 			$sensor_name = "cell" . $cell_id . "tmp" . $crop_id;
 			echo get_sensor($con, "tmp0") . "ºC";
 			echo get_sensor($con, "tmp0") . "ºC";
 			echo get_sensor($con, "tmp0") . "ºC";
 			echo get_sensor($con, "tmp0") . "ºC";
 			echo get_sensor($con, "tmp0") . "ºC";
 			echo get_sensor($con, "tmp0") . "ºC";
 		?></p>
	</div>
 	<div class="box">
 		<h1>Crop <?php $crop_id = 1; echo $crop_id; ?></h1>
 		<p><?php
 			$sensor_name = "cell" . $cell_id . "tmp" . $crop_id;
 			echo get_sensor($con, "tmp0"); 
 		?></p>
 	</div>
 	<div class="box">
 		<h1>Crop 2</h1>
 	</div>
	<div class="box">
		<h1>Crop 3</h1>
	</div>
	<div class="box">
		<h1>Crop 4</h1>
	</div>
	<div class="box">
		<h1>Crop 5</h1>
	</div>	
	<div class="box">
		<h1>Crop 6</h1>
	</div>			

</div>
	
</body>
</html>