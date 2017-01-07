<!-- Include Header -->
<?php include "includes/header.php"; 

	$about_us = "Naija Online Parrot is a pet project designed and developed by Osemeke Samuel.
				NOP as the site short name, was first launched in July 2015 as test run project. 
				The aims of this site is to disseminate happenings in Nigeria and the world at large.
				 Also to promote Nigeria music, most especially the coming and upcoming artists."
?>


<title>Naija Online Parrot | About Us</title>
<!-- Introduction -->
<div class="container-fluid" id="intro">
	<div class="rows">
		<div class="col-md-9">
			<h1 class="title" data-selector="h1">About Us</h1>
		</div>
		<div class="col-md-3 text-right"></div>
	</div>
</div>
<!-- Content -->
<div class="container-fluid" id="content">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<!-- Main Content -->
				<div class="col-md-9 col-sm-8" id="main">
					<p style="font-size: 20px"><?= nl2br($about_us) ?></p>
				</div>


<!-- Includes Sidebar and Footer -->
<?php include 'includes/sidebar.php'; ?>
<?php include 'includes/footer.php'; ?>
