<!-- Include Header -->
<?php include "includes/header.php"; 
	
	$a = $i = $e = $x = 1;

	// Create and Run Query For Most Viewed Articles
	$most_run = $db->getMostView();
	$total_most_run = $db->getTotalMostView();

	// Create and Run Query For Articles
	$art_run = $db->getLatestArticles();
	$art_total = $db->getTotalLastestArticles();
	$art_all = $db->getTotalArticles();

	// Create and Run Query For Comments
	$com_run = $db->getLastestComments();
	$com_total = $db->getTotalLastestComments();
	$com_all = $db->getTotalComments();

?>
		<!-- Admin Full Details -->
		<div class="col-md-10" id="dash-content">
			<!-- Counter -->
			<div id="counter" class="row">
				<div class="col-md-3">
					
				</div>
				<div class="col-md-3">
					<div id="icon">
						<div class="clearfix"  style="background-color:#556B2F; border-bottom: #556B2F solid 1px;">
							<i class="fa fa-file-text-o fa-3x pull-left" style="color: #556B2F;"></i>
							<span class="ctn-name pull-left">Articles</span>
						</div>
						<span class="ctn-fig" style="color: #556B2F"><?php echo $art_all; ?></span>
					</div>
				</div>
				<div class="col-md-3">
					<div id="icon">
						<div class="clearfix"  style="background-color: #f44336; border-bottom: #f44336 solid 1px;">
							<i class="fa fa-comments-o fa-3x pull-left" style="color: #f44336;"></i>
							<span class="ctn-name pull-left">Comments</span>
						</div>
						<span class="ctn-fig" style="color: #f44336;"><?php echo $com_all; ?></span>
					</div>
				</div>
			</div><!--/ counter -->
			<!-- Lists of Comments and Articles -->
			<div class="row" id="data">
				<div class="col-md-10 col-md-offset-1">
					<?php if($total_most_run): ?>
					<!-- Articles-->
					<div id="my-articles">
						<h2 id="admin-heading" style="background: #4dd0e1;">Most Viewed Articles</h2>
						<table class="table table-striped">
							<tr>
								<th>S/N</th>
								<th>Articles Title</th>
								<th>Articles Category</th>
								<th>Image</th>
								<th>Date</th>
								<th>Visitors</th>
							</tr>
						<?php foreach($most_run as $most_row): ?>
							<tr>
								<td><?php echo $a; ?></td>
								<td><?php echo $most_row['article_title']; ?></td>
								<td><?php echo $most_row['category']; ?></td>
								<td><img src="../img/<?php echo $most_row['article_image']; ?>" width="50" height="50" /></td>
								<td><?php echo time_format($most_row['article_date']); ?></td>
								<td align="center"><span class="badge" style="background: red; color:white; font-size: 18px; font-weight: bold;"><?php echo $most_row['article_counter']; ?></span></td>
							</tr>
						<?php $a++;
								endforeach; ?>
						</table>
					<?php else: ?>
						<p>There is no Article yet. <a href="insert_article.php"> Add new Article</a>.</p>
					<?php endif; ?>
					</div><!-- /Articles -->

					<!-- Last 10 Articles-->
					<?php if($art_total): ?>
					<div id="my-articles">
						<h2 id="admin-heading" style="background: #9400D3;">Latest Articles</h2>
						<table class="table table-striped">
							<tr>
								<th>S/N</th>
								<th>Articles Title</th>
								<th>Articles Category</th>
								<th>Image</th>
								<th>Date</th>
								<th>Article Poster</th>
							</tr>
						<?php foreach($art_run as $art_row): ?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $art_row['article_title']; ?></td>
								<td><?php echo $art_row['category']; ?></td>
								<td><img src="../img/<?php echo $art_row['article_image']; ?>" width="50" height="50" /></td>
								<td><?php echo time_format($art_row['article_date']); ?></td>
								<td><?php echo $art_row['article_author']; ?></td>
							</tr>
						<?php $i++;
								endforeach; ?>
						</table>
					</div><!-- /Last 10 Articles -->
					<?php endif; ?>
					<!-- Comments -->
					<?php if($com_total): ?>
					<div id="user_comment">
						<h2 id="admin-heading" style="background: #EEC591;">Most Comment Articles</h2>
						<table class="table table-striped">
							<tr>
								<th>S/N</th>
								<th>Name</th>
								<th>Comments Number</th>
								
							</tr>
						<?php foreach ($com_run as $com_row): ?>
							<tr>
								<td><?php echo $e; ?></td>
								<td><?php echo $com_row['article_title']; ?></td>
								<td><span class="badge" style="background: red; color:white; font-size: 18px; font-weight: bold;"><?php echo $com_row['total_comment']; ?></span></td>
							</tr>
						<?php $e++; endforeach; ?>
						</table>
					</div><!-- /Comments -->
					<?php endif; ?>
				</div>
			</div>

<!-- Include Footer -->
<?php include "includes/footer.php"; ?>