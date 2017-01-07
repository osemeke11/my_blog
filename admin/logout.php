<!-- Logout -->
<?php
	include '../helpers/format.php';
	session_start();
	// Logout Process
	unset($_SESSION['admin']);
	if(empty($_SESSION['admin'])){
		header("location: login.php");
	}
?>