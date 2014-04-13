<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	
	<meta charset="utf-8">
	<title>GreenMars :: Home</title>
	<meta name="description" content="GreenMars">
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="refresh" content="5" >


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
<body style="background-color:#2ecc71">
	<header>			
		<nav>
			<div class='container'>
				<div class='five columns logo'>
					<a href='#'>GreenMars :: Home</a>
				</div>

				<div class='eleven columns'>
					<ul class='mainMenu'>
						<li><a href='index.php' title='Home'>Home</a></li>
						<li><a href='admin.php' title='Admin'>Admin</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<div class='content'>
	<div class='orange'>

		<div class='container'>
			<h1>Welcome</h1>
			<img src="images/icon.png" style="max-width:256px;max-height:256px;">
			<h4>Sensor info</h4>
		</div>
	</div>
	<div class='container focus'>

		<?php
			$con=mysqli_connect("localhost","root","root123","sensors_db");
			// Check connection
			if (mysqli_connect_errno())
			  {
			  echo "<tr>Failed to connect to MySQL: " . mysqli_connect_error() . "</tr>";
			  }
		?> 
		<div class='eight columns'>
			<h4>Temperature Sensor</h4>
			<h5><a href="chart.php?sensor=tmp0">View Chart</a></h5>
			<p>
				<?php
					$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='tmp0';");
					while($row = mysqli_fetch_array($result))
				  	{
				  	
					$data = intval($row['sensor_data']);
					$max = intval($row['max_threshold']);
					$min = intval($row['min_threshold']);
					if ($data > $max){
						echo '<p style="color:#FF0000;"><img class="sensor_image" src="images/temp/temp_high.png"><br/>';
					} else if ($data < $min){
						echo '<p style="color:#0000FF;"><img class="sensor_image" src="images/temp/temp_low.png"><br/>';
					} else {
						echo '<p><img class="sensor_image" src="images/temp/temp_mid.png"><br/>';
					}
					echo $row['sensor_data'] . "°C (Degrees Celsius)</p>";
				  	}
				?>
			</p>
		</div>
		<div class='eight columns'>
			<h4>Humidity Sensor</h4>
			<h5><a href="chart.php?sensor=hue0">View Chart</a></h5>
			<p>
				<?php
					$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='hue0';");
					while($row = mysqli_fetch_array($result))
				  	{
				  	
					$data = intval($row['sensor_data']);
					$max = intval($row['max_threshold']);
					$min = intval($row['min_threshold']);
					if ($data > $max){
						echo '<p style="color:#FF0000;"><img class="sensor_image" src="images/humidity/humidity_high.png"><br/>';
					} else if ($data < $min){
						echo '<p style="color:#0000FF;"><img class="sensor_image" src="images/humidity/humidity_low.png"><br/>';
					} else {
						echo '<p><img class="sensor_image" src="images/humidity/humidity_mid.png"><br/>';
					}
					echo $row['sensor_data'] . "% Water Content</p>";
				  	}
				?>
			</p>
		</div>
		
		<div class='eight columns'>
			<h4>pH Sensor</h4>
			<h5><a href="chart.php?sensor=ph0">View Chart</a></h5>
			<p>
				<?php
					$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='ph0';");
					while($row = mysqli_fetch_array($result))
				  	{
				  	
					$data = intval($row['sensor_data']);
					$max = intval($row['max_threshold']);
					$min = intval($row['min_threshold']);
					if ($data > $max){
						echo '<p style="color:#FF0000;"><img class="sensor_image" src="images/ph/ph.png"><br/>';
					} else if ($data < $min){
						echo '<p style="color:#0000FF;"><img class="sensor_image" src="images/ph/ph.png"><br/>';
					} else {
						echo '<p><img class="sensor_image" src="images/ph/ph.png"><br/>';
					}
					echo $row['sensor_data'] . "</p>";
				  	}
				?>
			</p>
		</div>
		
		<div class='eight columns'>
			<h4>Moisture Sensor</h4>
			<h5><a href="chart.php?sensor=mos0">View Chart</a></h5>
			<p>
				<?php
					$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='mos0';");
					while($row = mysqli_fetch_array($result))
				  	{
				  	
					$data = intval($row['sensor_data']);
					$max = intval($row['max_threshold']);
					$min = intval($row['min_threshold']);
					if ($data > $max){
						echo '<p style="color:#FF0000;"><img class="sensor_image" src="images/moisture/moisture_high.png"><br/>';
					} else if ($data < $min){
						echo '<p style="color:#0000FF;"><img class="sensor_image" src="images/moisture/moisture_low.png"><br/>';
					} else {
						echo '<p><img class="sensor_image" src="images/moisture/moisture_mid.png"><br/>';
					}
					echo $row['sensor_data'] . "% Water Content</p>";
				  	}
				?>
			</p>
		</div>
		
		<div class='eight columns'>
			<h4>Light Sensor</h4>
			<h5><a href="chart.php?sensor=lis0">View Chart</a></h5>
			<p>
				<?php
					$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='lis0';");
					while($row = mysqli_fetch_array($result))
				  	{
				  	
					$data = intval($row['sensor_data']);
					$max = intval($row['max_threshold']);
					$min = intval($row['min_threshold']);
					if ($data > $max){
						echo '<p style="color:#FF0000;"><img class="sensor_image" src="images/light/light_high.png"><br/>';
					} else if ($data < $min){
						echo '<p style="color:#0000FF;"><img class="sensor_image" src="images/light/light_low.png"><br/>';
					} else {
						echo '<p><img class="sensor_image" src="images/light/light_mid.png"><br/>';
					}
					echo $row['sensor_data'] . "% Light</p>";
				  	}
				?>
			</p>
		</div>

		<div class='eight columns'>
			<h4>Pressure Sensor</h4>
			<h5><a href="chart.php?sensor=pre0">View Chart</a></h5>
			<p>
				<?php
					$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='pre0';");
					while($row = mysqli_fetch_array($result))
				  	{
				  	
					$data = intval($row['sensor_data']);
					$max = intval($row['max_threshold']);
					$min = intval($row['min_threshold']);
					if ($data > $max){
						echo '<p style="color:#FF0000;"><img class="sensor_image" src="images/pressure/pressure.png"><br/>';
					} else if ($data < $min){
						echo '<p style="color:#0000FF;"><img class="sensor_image" src="images/pressure/pressure.png"><br/>';
					} else {
						echo '<p><img class="sensor_image" src="images/pressure/pressure.png"><br/>';
					}
					echo $row['sensor_data'] . " mbar</p>";
				  	}
				?>
			</p>
		</div>


		<div class='clear'></div>


	
		
	<?php
		mysqli_close($con);
	?>
	</div>

	</div>


	

</body>
</html>
