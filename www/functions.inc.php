<?php

function connect_db() {
	return mysqli_connect("localhost","root","root123","sensors_db");
			if (mysqli_connect_errno())
			  {
			  echo "Failed to connect to MySQL: " . mysqli_connect_error();
			  }
}

function get_sensor($con, $sensor_name) {
	$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='" . $sensor_name . "';");
		while($row = mysqli_fetch_array($result)) {			 	
			return $row['sensor_data'];
		}
}

function check_status($con, $cell_id){
		//$sensor_name="cell" . $cell_id . $sensor_type . $crop_id;
		if( check_sensor($con, "tmp0") == 1 &&
			check_sensor($con, "tmp0") == 1 &&
			check_sensor($con, "tmp0") == 1 )
			 return "OK";
		else return "FAIL"; 
	}

function check_sensor($con, $sensor_name) {
	if( get_sensor($con, $sensor_name) > 19) return 1;
	else return 0;
}

function login() {
	if (($_POST["username"] == "admin") && ($_POST["password"] == "admin")){
		setcookie("user_login", "true", time()+3600);
		header( 'Location: index.php' ) ;
	}else{
		setcookie("user_login", "false", time()+3600);
		header( 'Location: login.php?login=invalid' ) ;
	}
}

function get_temp($con, $cell_id, $crop_id) {
	$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='cell" . $cell_id . "tmp" . $crop_id . "';");
		while($row = mysqli_fetch_array($result)) {			 	
			return $row['sensor_data'];
		}
}

function get_press($con, $cell_id, $crop_id) {
	$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='cell" . $cel_id . "press" . $crop_id . "';");
		while($row = mysqli_fetch_array($result)) {			 	
			return $row['sensor_data'];
		}
}

function get_light($con, $cell_id, $crop_id) {
	$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='cell" . $cel_id . "light" . $crop_id . "';");
		while($row = mysqli_fetch_array($result)) {			 	
			return $row['sensor_data'];
		}
}

function get_humi($con, $cell_id, $crop_id) {
	$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='cell" . $cel_id . "humi" . $crop_id . "';");
		while($row = mysqli_fetch_array($result)) {			 	
			return $row['sensor_data'];
		}
}

function get_oxy($con, $cell_id, $crop_id) {
	$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='cell" . $cel_id . "oxy" . $crop_id . "';");
		while($row = mysqli_fetch_array($result)) {			 	
			return $row['sensor_data'];
		}
}

function get_diox($con, $cell_id, $crop_id) {
	$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='cell" . $cel_id . "diox" . $crop_id . "';");
		while($row = mysqli_fetch_array($result)) {			 	
			return $row['sensor_data'];
		}
}

function get_mois($con, $cell_id, $crop_id) {
	$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='cell" . $cel_id . "mois" . $crop_id . "';");
		while($row = mysqli_fetch_array($result)) {			 	
			return $row['sensor_data'];
		}
}

function get_wtemp($con, $cell_id, $crop_id) {
	$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='cell" . $cel_id . "wtemp" . $crop_id . "';");
		while($row = mysqli_fetch_array($result)) {			 	
			return $row['sensor_data'];
		}
}

function get_wph($con, $cell_id, $crop_id) {
	$result = mysqli_query($con,"SELECT * FROM tbl_sensors where sensor_name='cell" . $cel_id . "wph" . $crop_id . "';");
		while($row = mysqli_fetch_array($result)) {			 	
			return $row['sensor_data'];
		}
}


?>