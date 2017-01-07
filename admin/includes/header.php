<!-- Includes -->
<?php
	session_start();
	include "../libraries/DBInteractor.php";
	include "../libraries/DB_admin.php";
	include "../libraries/image_uploader.php";
	include "../helpers/format.php";

	$db = new DB();

	$email = $_SESSION['admin'];
	
	if(empty($_SESSION['admin'])){
		header("location: logout.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>My Blog | Admin</title>
	<!-- CSS Links -->
	<link rel="shortcut icon" type="image/ico" href="../nop.ico" />
	<link rel="stylesheet" type="text/css" href="../css/custom.css" />
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
	<script type="text/javascript" src="../js/modernizr.custom.js"></script>
	
</head>
<body>
<!-- Header -->
<div class="container-fluid" id="preheader">
	<div class="row">
		<div class="col-md-1 col-md-offset-1">
			<!-- Logo -->
			<a href="index.php"><img src="../img/nop copy.png" alt="Naija Online Parrot Logo" class="img-responsive" /></a>
		</div>
		<div class="col-md-2"></div>
		<div class="col-md-7 clearfix">
			<!-- Greeting -->
			<span class="greeting pull-left"></span>
						<!-- Log Out -->
			<div class="pull-right" id="logout-box">
				<a href="logout.php"><i class="fa fa-sign-out fa-2x"></i></a>
			</div>
			<!-- Search -->
			<form method="get" action="../search.php" class="pull-right">
				<div id="form-container" class="clearfix">
					<i class="fa fa-search fa-2x pull-left"></i>
					<input type="text" name="search" class="txt" autocomplete="" placeholder="Enter tag to search" />
					<button type="submit" name="Search" class="butn pull-right" value="Search"><i class="fa fa-search fa-2x"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Introduction -->
<div class="container-fluid">
	<div class="row" id="admin-header">
		<div class="col-md-10 col-md-offset-1">
			<div class="clearfix">
				<h1 class="pull-left">Welcome Admin</h1>
				<div class="pull-right date">
					<p>Today's date:</p>
						<hr style="border: white 1px solid; padding:0; margin:0;" />
					<p><?php echo date('d.M.Y') ?></p>
				</div>
			</div>
		</div>
	</div>	
</div>
<!-- Admin -->
<div class="container-fluid">
	<div class="row">
		<!-- Admin Navigation -->
		<div class="col-md-2" id="navbar">
			<h2 id="nav-heading">Articles</h2>
			<ul class="nav" id="nav-list">
				<li><a href="insert_article.php">Insert New Article</a></li>
				<li><a href="view_articles.php">View All Articles</a></li>
			</ul>
			<h2 id="nav-heading">Category</h2>
			<ul class="nav" id="nav-list">
				<li><a href="insert_category.php">Insert New Category</a></li>
				<li><a href="view_category.php">View All Categories</a></li>
			</ul>
			<h2 id="nav-heading">Admins</h2>
			<ul class="nav" id="nav-list">
				<li><a href="create_admin.php">Create an Admin</a></li>
				<li><a href="view_admin.php">View Admins</a></li>
				<li><a href="edit_admin.php">Edit My account</a></li>
				<li><a href="change_password.php">Change Password</a></li>
			</ul>
			<h2 id="nav-heading">Settings</h2>
			<ul class="nav" id="nav-list">
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</div>