<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<!-- CSS Links -->
	<link rel="shortcut icon" type="image/ico" href="<?= asset($url, "nop.ico") ?>" />
	<link rel="stylesheet" type="text/css" href="<?= asset($url, "css/custom.css") ?>" /> 
	<link rel="stylesheet" type="text/css" href="<?= asset($url, "css/font-awesome.min.css") ?>" />
	<link rel="stylesheet" type="text/css" href="<?= asset($url, "css/bootstrap.css") ?>" />

</head>
<body>
<!-- Facebook Addon -->
<div id="fb-root"></div>
<script>
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=865929496795705";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<!-- /facebook -->
<!-- Header -->
<div class="container-fluid" id="preheader">
	<div class="row">
		<div class="col-md-2 col-md-offset-1 col-xs-2">
			<!-- Logo -->
			<a href="index.php"><img src="img/nop copy.png" alt="Naija Online Parrot Logo" class="img-responsive" /></a>
		</div>
		<div class="col-md-7 col-md-offset-1 col-xs-9 clearfix">
			<!-- Greeting -->
			<span class="greeting pull-left"></span>
			<!-- Search -->
			<form method="get" action="search.php" class="pull-right">
				<div id="form-container" class="clearfix">
					<i class="fa fa-search fa-2x pull-left"></i>
					<input type="text" name="search" class="txt" autocomplete="" placeholder="Enter article to search" />
					<button type="submit" name="Search" class="butn pull-right"><i class="fa fa-search fa-2x"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Navigation -->
<div class="container-fluid" id="nav">
	<div class="row">
		<nav class="navbar navbar-default" role="navigation" id="nav">
			<div class="col-md-10 col-md-offset-1">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<ul class="nav navbar-nav" id="menu">
						<li><a class="navbar-brand" style="display: block;" href="index.php">Home</a></li>
					</ul>
				</div>
				<div class="collapse navbar-collapse" id="example-navbar-collapse">
					<ul class="nav navbar-nav" id="menu">
						<?php foreach ($cat_run as $cat_row): ?>
					  		<li role="presentation">
					  			<a href="category.php?c=<?= $cat_row['catID']; ?>&u=<?= urlencode($cat_row['category_url']); ?>">
					  				<?= $cat_row['category']; ?>		
					  			</a>
					  		</li>
						<?php endforeach ?>
					</ul>
				</div>
			</div>
		</nav>
	</div>
</div>