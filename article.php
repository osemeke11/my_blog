<!-- Includes Header -->
<?php include "includes/header.php"; 
	if (isset($_GET['p'])) {
		$title = $_GET['p'];
		// Add hits
		$getCounter = $db->getAllData("articles WHERE article_url = '$title'");
		foreach($getCounter as $count_row){
			$condition = $count_row['article_counter'];
		}
		$condition +=1;
		$update_hits = $db->updateArticleCounter($condition, $title);
	}
	else{
		header("Location: index.php");
	}
	
	

	// Get Article 
	$post = $db->getArticleOne($title);

	// Get The Recent Feeds
	$feed = $db->getLastThreePosts();

	// Get Comments 
	$com_run = $db->getComments($title);
	$total_comments = $db->getTotalComments($title);
	
?>

<!-- Includes View -->
<?php require '/views/article.views.php'; ?>
<!-- Include Footer -->
<?php include "includes/footer.php"; ?>
<script>
$(document).ready(function(){
	$('div#login-error').hide();
	 $("form.comment").on('submit', function(){
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
				$("#login-error").show("slow");
				$('#login-error').html(response);
				setTimeout(function(){
					$('#login-error').hide("fast")
				}, 5000);
			}
		});
		return false;
	});
});
</script>