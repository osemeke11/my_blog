<!-- Include Header -->
<?php include "includes/header.php"; 

// Get Category for the Form
	// Create and Run Query
	$cat_run = $db->getCategoryForForm();

	// Validating The Articles
	if($_SERVER["REQUEST_METHOD"] == "POST") {
			
		//$message = array();
		$art_title = test_input($_POST['art_title']);
		$art_category = test_input($_POST['art_category']);
		$art_body = test_input($_POST['art_body']);
		$art_music = test_input($_POST['art_music']);
		$art_video = test_input($_POST['art_video']);
		$art_source = test_input($_POST['art_source']);
		$art_counter = 0;
		$art_url = createSlug($art_title) . ".html";

		$art_image = $_FILES['art_image']['name'];
		$art_image_tmp = $_FILES['art_image']['tmp_name'];

		
		$art_title_check = $db->checkTitleCount($art_title);
		if($art_title_check > 0){
			$message[] = "<li>The Article Title has been Used. Try Something else.</li>";
		}
		
		if(strlen($_POST['art-title']) <= 0){
			$message[] = "<li>Please Enter the Article Title! It must not be empty.</li>";
		}
		if(strlen($_POST['art-body']) <= 0){
			$message[] = "<li>Please Enter the Description about the article! It must not be empty.</li>";
		}
		if(strlen($_POST['art-category']) <= 0){
			$message[] = "<li>Please Select the category the article belongs! It must not be empty.<li>";
		}
		//foreach ($art_image as $photo){
			if(!preg_match('/[.](jpg)|(gif)|(png)$/', $art_image)){
    			$message[] = "<li>Please the file uploaded is not an Image! Please upload image with PNG, GIF, JPG and JPEG.</li>";
			}
		//}
		

		if(count($message) == 0){
			// Save image into Images Folder
			$path_to_image_directory = "../img/";
			$path_to_thumbs_directory = "../img/thumbnails/";
			$target = $path_to_image_directory . $art_image;	
			if(move_uploaded_file($art_image_tmp, $target)){
				createThumbnail($art_image, $path_to_image_directory, $path_to_thumbs_directory);
			}
			// Create and Run Query For Article Insertion
			$tableName = 'articles';
			$data = [
						'article_title' => $art_title,
						'article_category' => $art_category,
						'article_body' => $art_body,
						'article_image' => $art_image,
						'article_music' => $art_music,
						'article_video' => $art_video,
						'article_counter' => $art_counter,
						'article_source' => $art_source,
						'article_url' => $art_url,
						'article_author' => 'admin' 
					 ];
			$art_run = $db->addData($tableName, $data);
			if($art_run !== false){
				$message[] = "<li>You have just submitted an article successfully. The article can now be viewed.</li>";
			}else{
				$message[] = "<li>Article Not Submit!</li>";
			}
		}
	}

?>

<!-- Insert New Articles -->
<div class="col-md-10" id="dash-content">
	<?php if(isset($message)): ?>
		<div id="login-error">
			<ul class="warning">
				<?php foreach ($message as $item) {
					echo "<li>$item</li>";
				}
				?>
			</ul>
		</div>
	<?php endif; ?>
	<h2 class="text-primary">Insert New Articles</h2>
	<form method="post" id="add-article" action="<?php $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"> 
		<!-- Article Title -->
		<div class="form-group row">
			<label class="col-md-2">Article Title</label>
			<input type="text" name="art_title" class="form-normal col-md-4" id="art-title" value="<?php echo @$art_title; ?>" required />
		</div>
		<!-- Article Category -->
		<div class="form-group row">
			<label class="col-md-2">Article Category</label>
			<select class="form-normal col-md-3" name="art_category" id="art-category" required>
				<option value="">Select the article category</option>
				<?php foreach($cat_run as $cat_row): ?>
					<option value="<?php echo $cat_row['catID']; ?>">
						<?php echo $cat_row['category']; ?>
					</option>
				<?php endforeach; ?>
			</select>
		</div>
		<!-- Article Image -->
		<div class="form-group row">
			<label class="col-md-2">Article Image</label>
			<input type="file" name="art_image" id="art-image" class="form-normal col-md-3"  required />
		</div>
		<!-- Article Body -->
		<div class="form-group row">
			<div class="col-md-2">
				<label>Article Body</label>
			</div>
			<div class="col-md-4">
				<textarea name="art_body" class="form-text" id="art-body" cols="40" rows="10" required><?php echo @$art_body; ?></textarea>
			</div>
		</div>
		<!-- Article Music -->
		<div class="form-group row">
			<label class="col-md-2">Article Music</label>
			<input type="text" name="art_music" id="art-music" class="form-normal col-md-4" value="<?php echo @$art_music; ?>" />
		</div>
		<!-- Article Video -->
		<div class="form-group row">
			<label class="col-md-2">Article Videos</label>
			<input type="text" name="art_video" id="art-videos" class="form-normal col-md-4" value="<?php echo @$art_video; ?>" />
		</div>
		<!-- Article Source -->
		<div class="form-group row">
			<label class="col-md-2">Article Source</label>
			<input type="text" name="art_source" id="art-source" class="form-normal col-md-4" value="<?php echo @$art_source; ?>" />
		</div>
		<!-- Submit Button -->
		<div class="row form-group">
			<div class="col-md-3"></div>
			<input type="submit" value="Add Article" name="art_submit" id="art-submit" class="btn btn-primary col-md-2" />
		</div>
	</form>	
</div><!-- / Insert new article -->


<!-- Includes Footer -->
<?php include "includes/footer.php"; ?>