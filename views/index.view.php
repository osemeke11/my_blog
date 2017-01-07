<title>Naija Online Parrot | Let’s Make Things Better. Naija Music, Video Download, News, Entertainment Update and Sport</title>
<!-- Introduction -->
<div class="container-fluid" id="intro">
	<div class="rows">
		<div class="col-md-9">
			<h1 class="title" data-selector="h1"><strong>Latest Gists</strong> &amp; Music and Videos Download</h1>
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
				<?php if($total > 0): ?>
					<?php foreach($pagination as $paginate): ?>
					<!-- Articles Details -->
					<div id="article" class="row">
						<!-- Article Image -->
						<div class="col-md-2 col-sm-3" id="art-image">
							<a href="article.php?p=<?php echo $paginate['article_url']; ?>"><img src="img/thumbnails/<?php echo $paginate['article_image']; ?>" class="img-responsive thumbnail" /></a>
						</div>
						<!-- Article details -->
						<div class="col-md-9 col-sm-9">
							<h4 class="art-heading"><a href="article.php?p=<?php echo $paginate['article_url']; ?>"><?php echo $paginate['article_title']; ?></a></h4>
							<p class="art-body"><?php echo shorten($paginate['article_body']); ?></p> 
							<p class="com-view clearfix">
								<span class="pull-left"><a href="article.php?p=<?php echo $paginate['article_url']; ?>" style="border-bottom: solid red dotted;">Read On</a></span>
								<span class="badge pull-right"><i class="fa fa-eye"></i> <?php echo $paginate['article_counter']; ?> </span>
							</p>
						</div>
					</div>
				<?php endforeach; ?>

					<!--Number of Pages-->
					<ul id="pageNumber" class="pagination pagination-sm pagination-xs">
						<!-- Previous Button -->
						<li class="<?php if($page == 1) echo 'inactiveLink'; ?>"><a href="?p=<?php echo $prev; ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
						<!-- First Page -->
						<li><a href="?p=<?php echo $firstPage; ?>" aria-label="First"><span aria-hidden="true">First</span></a></li>

						<!-- Pagination Number -->
						<?php 
						$i = $page;
						if($page >=5){
							$page -= 4;
						}
						?>
						<?php for($x=$page; $x <= $page+9; $x++): ?>
							<li<?php if($i === $x){echo ' id="currentPage"';} ?>><a href="?p=<?php echo $x; ?>"><?php echo $x; ?> </a></li>
							<?php
								if($x == $pages) break;
							?>
						<?php endfor; ?>

						<!-- Last Page -->
						<li><a href="?p=<?php echo $pages; ?>" aria-label="Last"><span aria-hidden="true">Last</span></a></li>
						<!-- Next Button -->
						<li class="<?php if($i == $pages) echo 'inactiveLink'; ?>"><a href="?p=<?php echo $next; ?>">&raquo;</a></li>
					</ul>
					<!-- When There is no Articles -->
				<?php else: ?>
					<div class="alert alert-warning">
						<p><b>There is no articles now</b></p>
					</div>
				<?php endif; ?>
				<div id="advert">
						
				</div>
			</div>




