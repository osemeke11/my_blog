<!-- Includes Header -->
<?php include 'includes/header.php'; 
	
	$email = $_SESSION['admin'];
	
	// Create and Run Query For Admin Form Value
	$admin_run = $db->getAdminDetails($email);
?>

<!-- Edit My Admin Account -->
<div class="col-md-10" id="dash-content">
	<h2 class="text-primary">Edit My Account</h2>
	<?php foreach($admin_run as $admin_row): ?>
	<form method="post" action="includes/form_validation_process.php" class="edit_admin">
		<div class="form-group row">
			<label class="col-md-2">Name:</label>
			<input type="name" name="admin_name" class="form-normal col-md-3" value="<?php echo $admin_row['admin_name']; ?>">
		</div>
		<div class="form-group row">
			<label class="col-md-2">Email:</label>
			<input type="email" name="admin_email" class="form-normal col-md-3" value="<?php echo $admin_row['admin_email']; ?>">
		</div>
		<div class="form-group row">
		<input type="submit" name="edit_admin" class="btn btn-primary col-md-2 col-md-offset-2" value="Edit Your Account">
		</div>
	</form>
	<?php endforeach; ?>
</div>

<!-- Includes Footer -->
<?php include 'includes/footer.php'; ?>