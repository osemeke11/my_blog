<?php 

	// Add Comment
	include "../libraries/DBInteractor.php";
	include "../libraries/DB.php";
	include "../helpers/format.php";
	include "../libraries/class.phpmailer.php";

	$db = new DB();
	// validate the comments
	if (isset($_POST['submit'])) {

		$error = "";
		$com_name = test_input($_POST['name']);
		$com_msg = test_input($_POST['comment']);
		$url = $_POST['url'];
		
		// check the form is empty
		if (strlen($com_name) <= 0) {
      		$error .= "<li>Name is required!</li>";
   		}
   		if (!preg_match("/^[a-zA-Z ]*$/",$com_name)) {
 			$error .= "<li>Only letters and white space allowed!</li>"; 
		}
   		if(strlen($com_msg) <= 0){
   			$error .= "<li>Message is required!</li>";
   		}
   		if(strlen($error) == 0){
   			$tableName = 'comments';
   			$data = [
	            'comment_name' => $com_name,
	            'comment_message' => $com_msg,
	            'comment_url' => $url,
	            'comment_date' => date("Y-m-d H:i:s") 
        	];
   			$comm_run = $db->addData($tableName, $data);
   			if($comm_run){
   				echo $success = "<li>Comment Successfully!</li>";
   			}
   		}
   		echo $error;   		
	}