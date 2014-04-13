<!DOCTYPE html>
<html>
<?php
	if (!($_COOKIE["user_login"]=="true")){
			header( 'Location: login.php?login=login' ) ;
	} else {
		if ($_GET["go"]=="true"){
		
			$con=mysqli_connect("localhost","root","root123","sensors_db");
			// Check connection
			if (mysqli_connect_errno())
			  {
			  echo "<tr>Failed to connect to MySQL: " . mysqli_connect_error() . "</tr>";
			  }
			
			$q  = "DROP TABLE tbl_datalog;";
			mysqli_query($con,$q);
			$q = "CREATE table tbl_datalog (id MEDIUMINT NOT NULL AUTO_INCREMENT,now varchar(35) NOT NULL, sensor_name varchar(10) NOT NULL, sensor_data varchar(10), PRIMARY KEY (id) ) ENGINE=MyISAM;";
			mysqli_query($con,$q);
			
			mysqli_close($con);
		}
		header( 'Location: admin.php' );
	}
	
?>
</html>
