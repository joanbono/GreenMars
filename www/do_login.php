<!DOCTYPE html>
<html>
<?php
	
	if (($_POST["username"] == "admin") && ($_POST["password"] == "admin")){
		setcookie("user_login", "true", time()+3600);
		header( 'Location: index.php' ) ;
	}else{
		setcookie("user_login", "false", time()+3600);
		header( 'Location: login.php?login=invalid' ) ;
	}
	
?>
</html>