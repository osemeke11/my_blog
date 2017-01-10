<title>Naija Online Parrot | <?php echo ucfirst($search); ?></title>
<!-- Introduction -->
<div class="container-fluid" id="intro">
	<div class="rows">
		<div class="col-md-9">
			<h1 class="title" data-selector="h1">Search<br>
			<?php if(isset($_GET["search"])): ?>
					<small style="color: #e57373;">Searching for this content "<?php echo @$_GET["search"]; ?> "</small>
			<?php endif; ?>
			</h1>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>

<!-- Content -->
<div class="container-fluid" id="content">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<!-- Main Content -->
				<div class="col-md-9 col-sm-8" id="main">
					<!-- Articles Details -->
				<?php if($total_search > 0): ?>
				<?php foreach($search_run as $search_row): ?>
					<div id="article" class="row">
						<h4 class="art-heading"><a href="article.php?p=<?php echo $search_row['article_url']; ?>"><?php echo $search_row['article_title']; ?></a></h4>
						<p class="art-body"><?php echo shorten($search_row['article_body']); ?></p> 
						<p class="com-view clearfix">
							<span class="pull-left"><a href="article.php?p=<?php echo $search_row['article_url']; ?>" style="border-bottom: solid red dotted;">See More</a></span>
						</p>
					</div>
				<?php endforeach; ?>
				<?php else: ?>
					<p style="font-size: 16px">No Articles match the query. Try something else</p>
				<?php endif; ?>
			
				</div>

