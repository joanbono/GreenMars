<!DOCTYPE html>
<?php
	setcookie("user_login", "false", time()+3600);
	header( 'Location: login.php' ) ;
?>