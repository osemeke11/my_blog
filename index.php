<!-- Includes Header -->
<?php 

	include "includes/header.php"; 

	// User input
	$page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
	$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 20;
	$next = $page + 1; 	
	$prev = $page - 1;

	//Positioning 
	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

	$pagination = $db->getPaginatedArticles($start, $perPage);

	$total = $db->getTotalArticles();


	$pages = ceil($total / $perPage);

	$firstPage = 1;


	require 'views/index.view.php';

	
	include "includes/sidebar.php";
	include "includes/footer.php";

