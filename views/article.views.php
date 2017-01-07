
<!-- Introduction -->
<?php foreach ($post as $row): ?>

<div class="container-fluid" id="intro">
	<div class="rows">
		<div class="col-md-9 col-md-offset-1">
			<h1 class="art-title" data-selector="h1"><?php echo $row['article_title']; ?></h1>
		</div>
		<div class="col-md-3 text-right"></div>
	</div>
</div>

<!-- Content -->
<title>Naija Online Parrot | <?php echo $row['article_title']; ?></title>
<meta name="description=" content="<?php echo $row['article_title']; ?>">
<div class="container-fluid" id="content">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<!-- Articles Details -->
			<div id="article" class="row">
				<!-- Article Image -->
				<img src="img/<?php echo $row['article_image']; ?>" class="img-responsive thumbnail">
				<!-- Article details -->
				<p class="art-details">
					<span><?php echo time_format($row['article_date']) ?></span>
					<span><?php echo $row['article_author']; ?></span>
					<span><i class="fa fa-eye fa-2x"></i> <?php echo $row['article_counter']; ?></span>
				</p>
				<p class="art-body2"><?php echo $row['article_body']; ?></p> 
				<!-- Music Download Icon -->
				<?php if($row['article_music']): ?>
					<p class="art-music">
						<a href="http://<?php echo $row['article_music']; ?>" class="btn btn-danger btn-large"><i class="fa fa-cloud-download"></i> Download Mp3</a>
					</p>
				<?php endif; ?>
				<!-- Video Download Icon -->
				<?php if($row['article_video']): ?>
					<p>
						<a href="http://<?php echo $row['article_videos']; ?>" class="btn btn-primary btn-large"><i class="fa fa-cloud-download"></i>Download Video</a>
					</p>
				<?php endif; ?>
				<!-- Source -->
				<?php if($row['article_source']): ?>
					<p class="source">
						<a href="http://<?php echo strtolower($row['article_source']); ?>"><?php echo strtolower($row['article_source']); ?></a>
					</p>
				<?php endif; ?>
<?php endforeach; ?>

				<!-- Related Articles -->
				<div class="related">
					<h2>Recent Posts</h2>
					<div>
						<ul class="nav" id="rel-list">
				<?php foreach($feed as $rel): ?>
							<li>
								<a href="article.php?p=<?php echo $rel['article_url']; ?>"><?php echo $rel['article_title']; ?></a>
							</li>
				<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Comments -->
<div class="container-fluid">
	<div class="row">
		<div id="advert" class="col-md-7 col-md-offset-3">
			
		</div>
	</div>
	<div class="row" id="comments">
		<div class="col-md-5 col-md-offset-3">
			<h1>Comments</h1>
		<?php if($total_comments > 0) : ?>
			<p><b> <?php echo $total_comments; ?> comments</b></p>
			<?php foreach($com_run as $com): ?>
			<div id="comment">
				<p class="pull-left com-name"><?php echo $com['comment_name']; ?>:</p>
				<p class="pull-left com-name"><?php echo time_format($com['comment_date']); ?></p>
				<div class="comment">
					<?php echo $com['comment_message']; ?>
				</div>
			</div>
			<?php endforeach; ?>
		<?php else: ?>
			<p><b>There is <?php echo $total_comments; ?> comment</b></p>
		<?php endif; ?>
		</div>
			
		<!-- Comment Box -->
		<div id="form" class="row">
			<div class="col-md-4 col-sm-5 col-xs-8 col-sm-offset-2 col-md-offset-3 col-xs-offset-1">
				<div id="login-error"></div>
				<h3>Add Comment</h3>
				<form method="post" action="includes/form_validation.php" class="comment">
					<div class="form-group">
					<label>Name: <b style="color:red;">*</b></label>
					<input type="text" class="form-control" name="name" placeholder="Your Name" required />
					<input type="hidden" name="url" value="<?php echo $title; ?>" />
					</div>
					<div class="form-group">
						<label>Comments: <b style="color:red;">*</b></label>
						<textarea name="comment" class="form-control" rows="7" placeholder="Enter comments..." required></textarea>
					</div>
					<input type="submit" name="submit" class="btn btn-warning" />
				</form>
			</div>
		</div>
	</div>
</div>