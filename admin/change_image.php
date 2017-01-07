<!-- Includes Header -->
<?php include 'includes/header.php'; 

	$artID = isset($_GET['edit_art']) ? (int)$_GET['edit_art'] : 1;
	// Create and Run Query For Article
	$art_run = $db->getArticles($artID);
	/*
	 *	Form Validation to Change Image
	 */
	if(isset($_POST['change_image'])){
		$message = array();
		$artID = $_POST['article_id'];
		$art_image = $_FILES['image']['name'];
		$art_image_tmp = $_FILES['image']['tmp_name'];
		if(!preg_match('/[.](jpg)|(gif)|(png)$/', $art_image)){
    		$message[] = "<li>Please the file uploaded is not an Image! Please upload image with PNG, GIF, JPG and JPEG.</li>";
		}
		if(count($message) == 0){
			// Save image into file
			$path_to_image_directory = "../img/";
			$path_to_thumbs_directory = "../img/thumbnails/";
			$target = $path_to_image_directory . $art_image;
			if(move_uploaded_file($art_image_tmp, $target)){
				createThumbnail($art_image, $path_to_image_directory, $path_to_thumbs_directory);
			}
			$changeImage = $db->changeArticleImage($artID, $art_image);
			if($changeImage !== false){
				$message[] = "Article Image Changed Successfully!";
			}
		}
	}
?>

<div id="col-md-10" id="dash-content">
	<div class="container-fluid">
			<?php if(isset($message)){
				echo "<div id='login-error'>";
				echo '<ul class="warning">';
				foreach ($message as $item) {
					echo "<li>$item</li>";
				}
				echo '</ul>';
				echo "</div>";
			}
			?>
		<h2 class="text-primary">Change Article Image</h2>
		<?php foreach($art_run as $art_row): ?>
		<img src="../img/<?php echo $art_row['article_image']; ?>" class="img-responsive img-thumbnail" style="margin-left: 30px; margin-bottom: 30px;" />
		<?php endforeach; ?>
		<form action="" method="post" class="change_image" enctype="multipart/form-data">
			<!-- Article Image -->
			<div class="form-group">
				<label>Article Image</label>
				<input type="file" name="image" class="form-normal" />
			</div>
			<!-- Form Button -->
			<div class="form-group">
				<input type="hidden" name="article_id" value="<?php echo $artID; ?>">
				<input type="submit" name="change_image" class="btn btn-primary" value="Change Image" />
			</div>
		</form>
	</div>
</div>

<!-- Includes Footer -->
<?php include 'includes/footer.php'; ?>

<!-- <script type="text/javascript">
$(document).ready(function(){
	$("#login-error").hide();
	// Validate The Change Form
	$('#login-error').hide();
	$("form.change_image").on('submit', function(){
		var that = $(this),
			url = that.attr('action'),
			type = that.attr('method'),
			enctype = that.attr('enctype'),
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
			enctype: enctype,
			data: data,
			success: function(response){				
				$("#login-error").show();
				$('#login-error').html(response);
			}
		});
		return false;
	});
})
</script> -->