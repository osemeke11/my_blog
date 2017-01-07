<!-- Includes Header -->
<?php include "includes/header.php"; ?>
<?php

	// Validate the search Form
	if(isset($_GET['Search'])){
		$search = test_input($_GET['search']);
		if(empty($search)){
			header("location: index.php");
		}
		else{
			// Get the Search Content
			$search_run = $db->getSearchContent($search);
			$total_search = $db->getTotalSearch($search);
		}
	}

	require 'views/search.view.php';

?>
