<!-- Includes Header -->
<?php include 'includes/header.php'; 
	$artID = isset($_GET['edit_art']) ? (int)$_GET['edit_art'] : 1;
	// Create and Run Query For Article
	$art_run = $db->getArticles($artID);

	// Create and Run Query Category
	$cat_run = $db->getCategoryForForm();
?>

<div class="col-md-10">
	<div id="login-error"></div>
	<h2 class="text-primary">Edit Article</h2>
	<?php foreach($art_run as $art_row): ?>
	<!-- Form for Updating Article -->
	<form method="post" action="includes/form_validation_process.php" class="update_art">
		<!-- Article Title -->
		<div class="form-group row">
			<label class="col-md-2">Article Title</label>
			<input type="text" name="art_title" class="col-md-4 form-normal" value="<?php echo $art_row['article_title']; ?>" />
		</div>
		<!-- Article Category -->
		<div class="form-group row">
			<label class="col-md-2">Article Category</label>
			<select class="col-md-4 form-normal" name="art_category">
				<option value="<?php echo $art_row['article_category']; ?>"><?php echo $art_row['category']; ?></option>
			<?php foreach($cat_run as $cat_row): ?>
				<option value="<?php echo $cat_row['catID']; ?>"><?php echo $cat_row['category']; ?></option>
			<?php endforeach; ?>
			</select>
		</div>
		<!-- Article Body -->
		<div class="form-group row">
			<div class="col-md-2">
				<label>Article Body</label>
			</div>
			<div class="col-md-4">
				<textarea class="form-text" cols="40" rows="10" name="art_body"><?php echo $art_row['article_body']; ?></textarea>
			</div>
		</div>
		<!-- Article Music -->
		<div class="row form-group">
			<label class="col-md-2">Music</label>
			<input type="text" name="art_music" class="col-md-4 form-normal" value="<?php echo $art_row['article_music']; ?>" />
		</div>
		<!-- Article Video -->
		<div class="row form-group">
			<label class="col-md-2">Video</label>
			<input type="text" name="art_video" class="col-md-4 form-normal" value="<?php echo $art_row['article_video']; ?>" />
		</div>
		<!-- Article Source -->
		<div class="row form-group">
			<label class="col-md-2">Article Source</label>
			<input type="text" name="art_source" class="col-md-4 form-normal" value="<?php echo $art_row['article_source']; ?>" />
		</div>
		<!-- Submit Button -->
		<div class="row form-group">
			<input type="hidden" name="article_id" value="<?php echo $artID; ?>">
			<input type="submit" name="update_article" class="col-md-1 col-md-offset-2 btn btn-success">
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
	$("form.update_art").on('submit', function(){
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