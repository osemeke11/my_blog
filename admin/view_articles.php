<!-- Includes Header -->
<?php include "includes/header.php"; 
	
	// User input
	$page = isset($_GET['p']) ? (int)$_GET['p'] : 1;
	$perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 30;
	$next = $page + 1; 	
	$prev = $page - 1;

	//Positioning 
	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

	// Query
	$pagination = $db->getAllArticles($start, $perPage);

	//pages
	$total = $db->getTotalArticles();
	$pages = ceil($total / $perPage);
?>
<!-- View Articles -->
<div class="col-md-10" id="dash-content">
	<!-- Table for Viewing Articles -->
	<h2 class="text-primary">View Articles</h2>
	<table class="table table-striped">
		<tr>
			<th>S/N</th>
			<th>Article Title</th>
			<th>Article Image</th>
			<th>Article Category</th>
			<th>Date</th>
			<th>Counter</th>
			<th>Edit</th>
			<th>Change Image</th>
			<th>Delete</th>
		</tr>
		<?php 
			$i = 0;
			foreach($pagination as $paginate){
				$art_id = $paginate['articleID'];
				$art_title = $paginate['article_title'];
				$art_image = $paginate['article_image'];
				$art_category = $paginate['category'];
				$art_date = $paginate['article_date'];
				$art_counter = $paginate['article_counter'];
				$art_poster = $paginate['article_author'];
				$art_source = $paginate['article_source'];
				$i++;
		?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $art_title; ?></td>
			<td><img src="../img/<?php echo $art_image; ?>" alt="<?php echo $art_title; ?>" width="60" height="60" /></td>
			<td><?php echo $art_category; ?></td>
			<td><?php echo time_format($art_date); ?></td>
			<td><?php echo $art_counter; ?></td>
			<td><a href="edit_article.php?edit_art=<?php echo $art_id; ?>" class="btn btn-primary">Edit Article</a></td>
			<td><a href="change_image.php?edit_art=<?php echo $art_id; ?>" class="btn btn-success">Change Article Image</a></td>
			<td><a href="delete_article.php?del_art=<?php echo $art_id; ?>" class="btn btn-danger">Delete Article</a></td>
		</tr>
		<?php } ?>
	</table>
	<ul id="pageNumber" class="pagination pagination-lg pagination-sm">
		<li class="<?php if($page == 1) echo 'inactiveLink'; ?>"><a href="?=<?php echo $prev; ?>" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
		<?php for($x=1; $x <= $pages; $x++): ?>
			<li <?php if($page === $x) {echo ' id="currentPage"';} ?>><a href="?p=<?php echo $x; ?>"><?php echo $x; ?> </a></li>
		<?php endfor; ?>
		<li class="<?php if($page == $pages) echo 'inactiveLink'; ?>"><a href="?p=<?php echo $next; ?>">&raquo;</a></li>
	</ul>
	
</div>


<!-- Includes Footer -->
<?php include "includes/footer.php"; ?>