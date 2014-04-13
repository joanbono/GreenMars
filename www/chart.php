<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	
	<meta charset="utf-8">
	<title>GreenMars :: Sensors</title>
	<meta name="description" content="GreenMars">
    <meta http-equiv="X-UA-Compatible" content="IE=9" />
    <meta http-equiv="refresh" content=20 >
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
	<script src="js/Chart.js"></script>
</head>
<body>
	<header>			
		<nav>
			<div class='container'>
				<div class='five columns logo'>
					<a href='#'>GreenMars :: Sensors</a>
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
	<div class='orange'>

		<div class='container'>
			<canvas id="canvas" height="600" width="800"></canvas>
			<?php
				if (isset($_GET["sensor"])){
					$sensor = $_GET["sensor"];
					$con=mysqli_connect("localhost","root","root123","sensors_db");
					// Check connection
					if (mysqli_connect_errno())
					  {
					  echo "<tr>Failed to connect to MySQL: " . mysqli_connect_error() . "</tr>";
					  }
					
					$result = mysqli_query($con,"SELECT * FROM tbl_datalog WHERE sensor_name='".$sensor."'");
					$echo_labels = "[";
					$echo_data = "[";
					while($row = mysqli_fetch_array($result))
					  {
					  $time = substr($row['now'],0,-8);
					  $echo_labels = $echo_labels."'".$time."',";
					  $echo_data = $echo_data.$row['sensor_data'].",";
					  }
					$echo_data = substr($echo_data, 0, -1);
					$echo_labels = substr($echo_labels, 0, -1);
					$echo_data = $echo_data."]";
					$echo_labels = $echo_labels."]";
					
					mysqli_close($con);
				}
				
			?>
			<h1><?php echo "Displaying: ".$sensor; ?></h1>
		<script>

			var lineChartData = {
				labels : <?php echo $echo_labels; ?>,
				datasets : [
					{
						fillColor : "rgba(46,204,113,0.5)",
						strokeColor : "rgba(220,220,220,1)",
						pointColor : "rgba(220,220,220,1)",
						pointStrokeColor : "#fff",
						data : <?php echo $echo_data; ?>
					},
					
				]
				
			}

		var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
		
		</script>
			
			
		</div>
		

	</div>
</body>
</html>
