<!-- Include Header -->
<?php include 'includes/header.php'; ?>

<!-- Insert Category -->
<div class="col-md-10">
	<div class="row">
		<div class="col-md-9 col-md-offset-1">
			<div id="login-error"></div>
			<h2 class="text-primary">Insert New Category</h2>
			<!-- Form -->
			<form method="post" action="includes/form_validation_process.php" class="add-cat">
				<!-- Category -->
				<div class="form-group row" style="margin-top:30px;">
					<label class="col-md-3">New Category Name</label>
					<input type="text" name="category" class="form-normal col-md-4" required>
					<!-- Submit Button -->
					<input type="submit" name="add_category" class="col-md-2 col-md-offset-1 btn btn-primary" />
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Includes Footer -->
<?php include 'includes/footer.php'; ?>

<script type="text/javascript">
$(document).ready(function(){
	// Validate The Change Form
		$('#login-error').hide();
		$("form.add-cat").on('submit', function(){
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