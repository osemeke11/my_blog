<?php
	
	include "../libraries/class.phpmailer.php";
	session_start();
	
	
	$errors = [];
	
	if(isset($_POST['name'], $_POST['email'], $_POST['message'])){
		$fields =[
			'name' => $_POST['name'],
			'email' => $_POST['email'],
			'message' => $_POST['message']
		];
		
		foreach($fields as $field => $data){
			if(empty($data)){
				echo $errors = "The " . $field . " field is required.";
			}
		}
		
		if(empty($errors)){
			$mail = new PHPMailer;
			$mail->IsSMTP();
			$mail->SMTPAuth = true;
			$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
			$mail->Port       = 465;                   // set the SMTP port
			
			$mail->Username   = "mrexcelsam1@gmail.com";  // GMAIL username
			$mail->Password   = "adepeju1";            // GMAIL password
			$mail->SMTPSecure = 'ssl';
			
			$mail->isHTML();
			
			$mail->Subject = "Contact form submitted";
			$mail->Body = 'From: ' . $fields['name'] . ' (' . $fields['email'] . ')<p>' . $fields['message'] . '</p>';
			$mail->FromName= 'Contact';
			$mail->AddAddress('mrexcelsam1@gmail.com', 'Osemeke Samuel');
			
			if($mail->send()){
				echo $thanks = "Thanks, we have your message. We will get to you soon!";
				header('Location: ../contact.php?p='. $thanks);
			}else{
				echo $errors = "Sorry, could not send email. Try again later.";
			}
		}
	}
	else{
		echo $errors = "Something went wrong.";
	}
	
?>