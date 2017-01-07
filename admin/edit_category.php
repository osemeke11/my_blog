<!-- Includes Header -->
<?php include 'includes/header.php'; 

	// Get Category ID
	$catID = isset($_GET['ed_cat']) ? (int)$_GET['ed_cat'] : 1;
	// Create and Run Query
	$cat_run = $db->getSingleCategory($catID);
?>

<!-- Edit Category Selected -->
<div class="col-md-10">
	<div id="login-error"></div>
	<h2 class="text-primary">Edit Category</h2>
	<?php foreach($cat_run as $cat_row): ?>
	<form action="includes/form_validation_process.php" method="post" class="edit_cat">
		<div class="row form-group" style="margin-top:30px">
			<label class="col-md-2">Edit Category</label>
			<input type="text" name="category" class="col-md-3 form-normal" value="<?php echo $cat_row['category']; ?>" required />
			<input type="hidden" name="cat_id" value="<?php echo $catID; ?>" />
			<input type="submit" name="edit_category" class="btn btn-primary col-md-2 col-md-offset-1" />
		</div>
	</form>
	<?php endforeach; ?>
</div>

<!-- Includes Footer -->
<?php include 'includes/footer.php'; ?>

<script type="text/javascript">
$(document).ready(function(){
	// Validate The Change Form
	$('#login-error').hide();
	$("form.edit_cat").on('submit', function(){
		var that = $(this),
			url = that.attr('action'),
			type = that.attr('method'),
			data = {};
			
		that.find('[name]').each(function(index, value){
			var that = $(this),
				name = that.attr('name'),
				value = that.val();
				
			data[name] = value;
		});
		
		$.ajax({
			url: url,
			type: type,
			data: data,
			success: function(response){				
				$("#login-error").show();
				$('#login-error').html(response);
			}
		});
		return false;
	});
})
</script>