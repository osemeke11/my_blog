<?php
	session_start();
	include "../../libraries/DBInteractor.php";
	include "../../libraries/DB_admin.php";
	include "../../helpers/format.php";

	$db = new DB();

	$email = $_SESSION['admin'];

	/*
	 *	Form Validation For Change Password
	 */
	if(isset($_POST['change_pass'])){
		$error = "";
		$cur_pass = sha1($_POST['cur_pass']);
		$real_pass = $_POST['new_pass'];
		$new_pass2 = sha1($_POST['new_pass2']);
		$new_pass = sha1($_POST['new_pass']);

		// Create and Run Query For Password Matches
		$pass_total = $db->checkPassword($email, $cur_pass);
		if($pass_total == 0){
			$error .= "<li>Enter Correct Password!</li>";
		}

		if($new_pass != $new_pass2){
			$error .= "<li>Passwords do not match!</li>";
		}

		if(!preg_match("/^[a-z0-9_-]{6,20}$/", $real_pass)){
			$error .= "<li>Please Enter Password, 6-20 characters.</li>";
		}

		if(strlen($error) == 0){
			$change_sql = $db->change_admin_pass($new_pass, $real_pass, $email);
			if($change_sql){
				echo $message = "Password Change Successfully!";
			}
		}else{
			echo $error;
		}

	}

	/*
	 *	Create An Admin
	 */

	if(isset($_POST['add_admin'])){

		$error = "";
		$admin_fname = test_input($_POST['admin_fname']);
		$admin_lname = test_input($_POST['admin_lname']);
		$admin_email = test_input($_POST['admin_email']);
		$admin_pass = test_input($_POST['admin_pass']);
		$admin_pass2 = test_input($_POST['confirm_pass']);

		if (!preg_match("/^[a-zA-Z ]*$/", $_POST['admin_fname'])) {
  			$error .= "<li>Only letters and white space allowed</li>"; 	
		}

		if (!preg_match("/^[a-zA-Z ]*$/", $_POST['admin_lname'])) {
  			$error .= "<li>Only letters and white space allowed</li>"; 	
		}

		if (!filter_var($admin_email, FILTER_VALIDATE_EMAIL)) {
    		$error .= "<li>Invalid email format</li>"; 
    		
    	}

		$admin_email_run = $db->checkAdminEmail($admin_email);
		if ($admin_email_run > 0) {
			$error .= "<li>The email has already been used.</li>";
			
		}
		if (strlen($_POST['admin_pass']) < 6) {
			$error .= "<li>Password must contain atleast 6 characters!</li>";
			
		}
		if($_POST['admin_pass'] != $_POST['confirm_pass']){
			$error .= "<li>Passwords don't match!</li>";
		}
		if(strlen($error) == 0){
			$admin_name = ucfirst($admin_fname) . " " . ucfirst($admin_lname);
			$real_pass = $admin_pass;
			$admin_pass = sha1($admin_pass);
			// Create and Run Query
			$tableName = 'admin';
			$data = [
				'admin_name' => $admin_name,
				'admin_email' => $admin_email,
				'admin_pass' => $admin_pass, 
				'real_pass' =>  $real_pass
			];
			$add_run = $db->addData($tableName, $data);
			if($add_run){
				echo $success = "Admin Member added successfully. Welcome on board!";
			}
		} else{
			echo $error;
		}
		
	}

	/*
	 *	Delete Admin
	 */
	if(isset($_POST['yes'])){
		// Create and Run Query 
		$adminID = $_POST['admin_id'];
		$tableName = 'admin';
		$admin_run = $db->deleteData($tableName, 'adminID', $adminID);
		if($admin_run){
			echo $message = "Admin Member Deleted Successfully.";
		}
	}


	/*
	 * Delete Articles
	 */

	if(isset($_POST['delete_article'])){
		// Create and Run Query
		$artID = $_POST['article_id'];
		$tableName = 'articles';
		$delete_qry = $db->deleteData($tableName, 'articleID', $artID);
		if($delete_qry){
			echo $success = "Article has been successfully deleted!";
		}
	}

	/*
	 *	Form Validation to Delete Category
	 */

	if(isset($_POST['del_category'])){
		// Create and Run Query
		$catID = $_POST['cat_id'];
		$tableName = 'category';
		$delete_qry = $db->deleteData($tableName, 'catID', $catID);
		if($delete_qry){
			echo $success = "Category has been successfully deleted!";
		}
	}

	/*
	 *	Form Validation to Edit the Admin Details
	 */

	if(isset($_POST['edit_admin'])){
		$admin_name = test_input($_POST['admin_name']);
		$admin_email = test_input($_POST['admin_email']);
		$edit_run = $db->updateAdminDate($admin_name, $admin_email, $email);
		if($edit_run){
			echo $message = "Update Data Successfully!";
			header("location: ../logout.php");
		}
	}

	/*
	 *	Form Validation to Edit Article
	 */

	if (isset($_POST['update_article'])) {
			
		$error = "";
		$artID = $_POST['article_id'];
		$art_title = test_input($_POST['art_title']);
		$art_category = test_input($_POST['art_category']);
		$art_body = test_input($_POST['art_body']);
		$art_music = test_input($_POST['art_music']);
		$art_video = test_input($_POST['art_video']);
		$art_source = test_input($_POST['art_source']);
		$art_url = createSlug($art_title) . ".html";

		if(strlen($_POST['art_title']) <= 0){
			$error .= "<li>Please Enter the Article Title! It must not be empty.</li>";
		}

		if(strlen($_POST['art_body']) <= 0){
			$error .= "<li>Please Enter the Description about the article! It must not be empty.</li>";
		}

		if(strlen($_POST['art_category']) <= 0){
			$error .= "<li>Please Select the category the article belongs! It must not be empty.</li>";
		}

		if(strlen($error) == 0){
			// Create and Run Query For Article Insertion
			$art_run = $db->updateArticlesData($artID, $art_title, $art_category, $art_body, $art_music, $art_video, $art_source, $art_url );
			if($art_run !== false){
				echo $success = "Article edited successfully. The article can now be viewed.";
			}
			else{
				$error .= "<li>Article not Updated successfully</li>";
			}
		}
		else{
			echo $error;
		}
	}


	/*
	 *	Form Validation to Edit Category
	 */
	if (isset($_POST['edit_category'])) {
		$cat_name = test_input($_POST['category']);
		$cat_url = createSlug($cat_name).".html";
		$catID = test_input($_POST['cat_id']);
		
		// Create and Run Query
		$cat_qry = $db->updateCatData($catID, $cat_name, $cat_url);
		if($cat_qry !== false){
			echo $success = "Category Updated Successfully!";
		}
	}


	/*
	 *	Form Validation to Insert Category
	 */
	if(isset($_POST['add_category'])){
		// Get the data 
		$category = test_input($_POST['category']);
		$cat_url = createSlug($category).".html";
		$data = [
			'category' => $category,
			'category_url' => $cat_url
		];
		$tableName = 'category';
		// Create and Run Query 
		$cat_run = $db->addData($tableName, $data);
		if($cat_run !== false){
			echo $success = "New Category has been Successfully Added!";
		}
	}
?>