<!-- Include Header -->
<?php include 'includes/header.php'; 
	// Get the Category Details
	$catID = isset($_GET['del_cat']) ? (int)$_GET['del_cat'] : 1;
?>

<!-- Delete Article -->
<div class="col-md-10">
	<div class="centered">
		<div id="login-error"></div>
		<h3>Do you really want to DELETE this category?</h3>
		<form method="post" action="includes/form_validation_process.php" class="del_category">
			<br /><br />
			<input type="hidden" name="cat_id" value="<?php echo $catID; ?>">
			<input type="submit" name="del_category" value="Yes, I want" class="btn btn-danger" />
			<a href="index.php" class="btn btn-warning">Go Back to Admin</a>
		</form>
	</div>
</div>


<!-- Include Footer -->
<?php include'includes/footer.php'; ?>

<script type="text/javascript">
$(document).ready(function(){
	$('#login-error').hide();
	$("form.del_category").on('submit', function(){
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