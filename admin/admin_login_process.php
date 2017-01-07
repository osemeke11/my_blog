<?php
	include "../libraries/DBInteractor.php";
	include "../libraries/DB_admin.php";
	include "../libraries/database.php";
	include "../helpers/format.php";

	$db = new DB();

	session_start();
	// Process The Admin Login Process
	if(isset($_POST['enter_admin'])){
		$error;
		$username = test_input($_POST['admin_email']);
		$password = test_input($_POST['admin_pass']);

		if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {
    		 $error = "Invalid email format"; 
    	}
		
		if(!preg_match("/^[a-z0-9_-]{6,20}$/", $password)){
			$error = "Please Enter Password, 6 to 20 characters.";
		}
		
		if(count($error) == 0){
			// Create query
			$password = sha1($password);
			$admin_run = $db->checkAdminLogin($username, $password);
			$total_admin = $db->checkAdminLoginTotal($username, $password);
			if($total_admin == 0){
				$error = "Email or Password incorrect.";
			}
			else{
				foreach($admin_run as $admin_row) {
					$_SESSION["admin"] = $admin_row['admin_email'];
				}	
				header('Location: index.php');
			}
		}
		if(count($error) != 0){
			header("Location:login.php?error=". createSlug($error));
		}
	}
?>