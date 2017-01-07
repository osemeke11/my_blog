<!-- Includes Header -->
<?php include 'includes/header.php'; 

	// Select All Admins
	$admin_run = $db->getAdminMember();
	$total = $db->getTotalAdmin();
?>

<!-- View All Admins -->
<div class="col-md-10" id="dash-content">
	<h2 class="text-primary">View All Admins</h2>
	<!-- Table to View All Admins -->
	<?php if($total > 0): ?>
	<table class="table table-striped">
		<tr>
			<th>Admin Name</th>
			<th>Admin Email</th>
			<th>Register Date</th>
			<th>Delete Admin</th>
		</tr>
		<?php foreach($admin_run as $admin_row): ?>
		<tr>
			<td><?php echo $admin_row['admin_name']; ?></td>
			<td><?php echo strtolower($admin_row['admin_email']); ?></td>
			<td><?php echo time_format($admin_row['register_date']); ?></td>
			<td><a href="delete_admin.php?adminID=<?php echo $admin_row['adminID']; ?>" class="btn btn-danger">Delete</a></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php else: ?>
		<div class="alert alert-danger">
			<h4>There is no admin available!!!</h4>
			<p><a href="index.php" class="btn btn-primary">Go Back to Admin</a></p>
		</div>
	<?php endif; ?>
</div>



<!-- Includes Footer -->
<?php include 'includes/footer.php'; ?>