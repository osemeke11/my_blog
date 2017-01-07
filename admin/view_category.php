<!-- Includes Header -->
<?php include 'includes/header.php'; 

	// Select all the Categories
	$cat_run = $db->getCategoryForForm();
	$i = 1;
?>

<!-- View All Categories -->
<div class="col-md-10">
	<h2 class="text-primary">View Categories</h2>
	<!-- Table of the Categories -->
	<table class="table table-striped">
		<tr>
			<th>S/N</th>
			<th>Category</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<!-- View the Categories -->
		<?php foreach($cat_run as $cat_row){ ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $cat_row['category']; ?></td>
			<td><a href="edit_category.php?ed_cat=<?php echo $cat_row['catID']; ?>" class="btn btn-primary">Edit Category</a></td>
			<td><a href="delete_category.php?del_cat=<?php echo $cat_row['catID']; ?>" class="btn btn-danger">Delete Category</a></td>
		</tr>
		<?php $i++;
			}
		 ?>
	</table>
</div>



<!-- Includes Footer -->
<?php include 'includes/footer.php'; ?>