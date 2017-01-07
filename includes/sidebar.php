<?php
	// Run Query for Music
	$music_run = $db->getDataList("articles", "Music");
	$music_total = $db->getDataTotal("articles", "Music");

	// Run Query for Videos
	$videos_run = $db->getDataList("articles", "Videos");
	$videos_total = $db->getDataTotal("articles", "Videos");

	// Create and Run Query for Most Views
	$view_run = $db->getMostView();
	$view_total = $db->getMostViewTotal();

	// Create and Run Query for Recent date
	$recent_run = $db->getRecent();
	$recent_total = $db->getRecentTotal();

?>
				<!-- Sub Content -->
				<div class="col-md-3 col-sm-4 col-xs-11" id="sidebar">
					<!-- Editorials -->
					<div id="editorial">
						<h4 id="side-heading">Music</h4>
						<?php if($music_total > 0): ?>
							<ul class="nav" id="list clearfix">
							<?php foreach($music_run as $music_row): ?>
								<a href="article.php?p=<?php echo $music_row['article_url']; ?>"><li><?php echo $music_row['article_title']; ?></li></a>
							<?php endforeach; ?>
							</ul>
						<?php else: ?>
							<p>There is no post yet.</p>
						<?php endif; ?>
					</div>
					<!-- Videos -->
					<div id="editorial">
						<h4 id="side-heading">Videos</h4>
						<?php if($videos_total > 0): ?>
							<ul class="nav" id="list clearfix">
							<?php foreach($videos_run as $video_row): ?>
								<a href="article.php?p=<?php echo $video_row['article_url']; ?>"><li><?php echo $video_row['article_title']; ?></li></a>
							<?php endforeach; ?>
							</ul>
						<?php else: ?>
							<p>There is no post yet.</p>
						<?php endif; ?>
					</div>
					<!-- SideBar -->
					<div id="info">
					    <!-- Nav tabs -->
					    <ul class="nav nav-tabs" role="tablist" id="myTab">
					    	<li role="presentation" class="active"><a href="#popular" aria-controls="popular" role="tab" data-toggle="tab">Most viewed</a></li>
					    	<li role="presentation"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">Recent</a></li>
					    </ul>
						<div class="tab-content" id="myTabContent">
							<!-- Popular -->
						    <div role="tabpanel" class="tab-pane active" id="popular">
						    <?php if($view_total > 0): ?>
								<ul class="nav" id="list">
								<?php foreach($view_run as $view_row): ?>
									<a href="article.php?p=<?php echo $view_row['article_url']; ?>"><li><?php echo $view_row['article_title']; ?>: <?php echo $view_row['article_counter']; ?></li></a>
								<?php endforeach; ?>
								</ul>
							<?php else: ?>
								<p style="color: white; padding-top: 5px;">There is no post yet.</p>
							<?php endif; ?>
						    </div><!-- /Popular -->
						    <!-- Recent -->
						    <div role="tabpanel" class="tab-pane" id="recent">
						    <?php if($recent_total > 0): ?>
								<ul class="nav" id="list">
								<?php foreach($recent_run as $recent_row): ?>
									<a href="article.php?p=<?php echo $recent_row['article_url']; ?>"><li><?php echo $recent_row['article_title']; ?></li></a>
								<?php endforeach; ?>
								</ul>
							<?php else: ?>
								<p style="color: white; padding-top: 5px;">There is no post yet.</p>
							<?php endif; ?>
							</div><!-- /Recent -->
						</div> 
    				</div><!-- /info -->
				</div>
			</div>
		</div>
	</div>
</div>
<?php
// function get_browser_name($user_agent)
// {
//     if (strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR/')) return 'Opera';
//     elseif (strpos($user_agent, 'Edge')) return 'Edge';
//     elseif (strpos($user_agent, 'Chrome')) return 'Chrome';
//     elseif (strpos($user_agent, 'Safari')) return 'Safari';
//     elseif (strpos($user_agent, 'Firefox')) return 'Firefox';
//     elseif (strpos($user_agent, 'MSIE') || strpos($user_agent, 'Trident/7')) return 'Internet Explorer';
    
//     return 'Other';
// }

// // Usage:

// echo get_browser_name($_SERVER['HTTP_USER_AGENT']);


// now try it
// $ua=getBrowser();
// $yourbrowser= "Your browser: " . $ua['name'] . " " . $ua['version'] . " on " .$ua['platform'] . " reports: <br >" . $ua['userAgent'];
// print_r($yourbrowser);
?>