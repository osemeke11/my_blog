<!-- Includes -->
<?php
	include "libraries/DBInteractor.php";
	include "libraries/DB.php";
	include "helpers/format.php";
	include "libraries/class.phpmailer.php";

	$url = $_SERVER['PHP_SELF'];
	//echo asset($url, "css/custom.css");

	$db = new DB();

	$cat_run = $db->getAllData("category");

    require "views/header.view.php";

