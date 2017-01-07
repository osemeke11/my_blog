<!-- PHP Codes -->
<?php
	include "../helpers/format.php";
	session_start();
	// Get the user Id
	@$error = $_GET['error'];
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<!-- CSS Links -->
	<link rel="shortcut icon" type="image/ico" href="../nop.ico" />
	<link rel="stylesheet" type="text/css" href="../css/custom.css" />
	<link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />

</head>
<body style="background-image: url('../img/login.jpg');">
<!-- Container For Admin Login -->
<div class="container-fluid" id="login-container">
	<div class="row">
		<div class="col-md-3 col-md-offset-4 col-sm-8 col-sm-offset-2" id="login-box">
			<!-- Logo -->
			<div id="login-img-box" class="row">
				<div class="col-md-8 col-md-offset-2">
					<a href="../index.php"><img src="../img/nop copy.png" class="img-thumbnail" id="login-img" /></a>
				</div>
				<p class="login-msg text-primary">Welcome to NaijaOnlineParrot.com</p>
			</div>
			<!-- /Logo -->
			<!-- Error box -->
			<?php if(isset($_GET['error'])): ?>
			<div id="login-error">
				<p><?php echo loginStatement($error); ?></p>		
			</div>
			<?php endif; ?>
			<!-- Form -->
			<form action="admin_login_process.php" method="post" id="login-form" class="login-form">
				<div class="form-group row">
					<label class="col-md-5 col-sm-4 col-lg-4">Email:</label>
					<input type="email" name="admin_email" class="form-normal col-md-7 col-sm-8 col-lg-8" placeholder="Enter your Email" id="admin_email" /><br>
					<span class="form-error" id="email_admin_error"></span>
				</div>
				<div class="row form-group">
					<label class="col-md-5 col-sm-4 col-lg-4">Password:</label>
					<input type="password" name="admin_pass" class="form-normal col-md-7 col-sm-8 col-lg-8" placeholder="*******" id="admin_pass" /><br>
					<span class="form-error" id="pass_admin_error"></span>
				</div>

				<div class="form-group">
					<input type="submit" name="enter_admin" class="btn btn-success">
				</div>
			</form>
			<!-- / Form -->
		</div>
	</div>
</div>



<!-- Includes JS Plugin -->
	<script type="text/javascript" src="../js/jquery-1.11.3.js"></script>
	<script type="text/javascript" src="../js/bootstrap.js"></script>
	<script type="text/javascript" src="../js/custom.js"></script>
</body>
</html>

<?php 
// unset the session
unset($_SESSION['user']);
?>
<script type="text/javascript">
	
	/*
	 *	 Jquery Validation For Admin Login 
	 */
	$("#email_admin_error").hide(); 
	$("#pass_admin_error").hide(); 

	// Error variable
	var error_login_email = false;
	var error_login_pass = false;

	// Focus Validation
	$("#admin_email").focusout(function(){
		check_email_login();
	});

	$("#admin_pass").focusout(function(){
		check_pass_login();
	});

	// Check Admin Email Function
	function check_email(){
		var admin_email = $("#admin_email").val();
		var regex = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
		if(!regex.test(admin_email)){
			$("#email_admin_error").html("This is not an email!");
			$("#email_admin_error").show();
		}
		else{
			$("#email_admin_error").hide();
		}
	}

	// Check Admin Pass Function
	function check_pass_login(){
		var admin_pass = $("#admin_pass").val().length;
		if(admin_pass < 6){
			$("#pass_admin_error").html("Password must contain atleast 6 characters!");
			$("#pass_admin_error").show();
		}
		else{
			$("#pass_admin_error").hide();
		}
	}

	// JQuery Validation to Form Login
	$("#login_form").submit(function(){
		
		error_login_email = false;
		error_login_pass = false;
		
		check_email_login();
		check_pass_login();

		if(error_login_email == false || error_login_pass == false){
			return true;
		}
		else{
			return false;
			 e.preventDefault();
		}
	});

</script>