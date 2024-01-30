<?php
	session_start();
	$_SESSION['id'] = "";
	header("Location: http://localhost/Website/LoginSignup.php");
	exit();
?>