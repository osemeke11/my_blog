<!-- Includes Header -->
<?php include 'includes/header.php'; ?>
	
<!-- Create New Admin -->
<div class="col-md-10" id="dash-content">
	<div id="login-error"></div>
	<h2 class="text-primary">Add New Admin Member</h2>
	<!-- Add New Admin -->
	<form method="post" action="includes/form_validation_process.php" enctype="multipart/form-data" class="create-admin">
		<!-- Admin First Name -->
		<div class="row form-group">
			<label class="col-md-2">Admin First Name:</label>
			<input type="text" name="admin_fname" class="col-md-3 form-normal" id="admin_fname" value="<?php echo @$admin_name; ?>" required />
			<span class="col-md-4 form-error" id="fname_error"></span>
		</div>
		<!-- Admin Last Name -->
		<div class="row form-group">
			<label class="col-md-2">Admin Last Name:</label>
			<input type="text" name="admin_lname" class="col-md-3 form-normal" id="admin_lname" value="<?php echo @$admin_name; ?>" required />
			<span class="col-md-4 form-error" id="lname_error"></span>
		</div>
		<!-- Admin Email -->
		<div class="row form-group">
			<label class="col-md-2">Email:</label>
			<input type="email" name="admin_email" class="col-md-3 form-normal" id="admin_email" value="<?php echo @$admin_email; ?>" required />
			<span class="col-md-4 form-error" id="email_error"></span>
		</div>
		<!-- Admin Password -->
		<div class="row form-group">
			<label class="col-md-2">Password:</label>
			<input type="password" name="admin_pass" class="col-md-3 form-normal" id="admin_pass" required />
			<span class="col-md-4 form-error" id="pass_error"></span>
		</div>
		<!-- Confirm Password -->
		<div class="row form-group">
			<label class="col-md-2">Confirm Password</label>
			<input type="password" name="confirm_pass" class="col-md-3 form-normal" id="admin_pass2" required />
			<span class="col-md-4 form-error" id="pass2_error"></span>
		</div>
		<!-- Submit Button -->
		<div class="row form-group">
			<input type="submit" name="add_admin" class="col-md-2  col-md-offset-2 btn btn-success" id="add_admin" value="Add Admin Member">
		</div>
	</form>
</div>

<!-- Includes Footer -->
<?php include 'includes/footer.php'; ?>

<script type="text/javascript">
	$(document).ready(function(e){
	
	    // Add Admin Validation
	    $("#fname_error").hide();
	    $("#lname_error").hide();
	    $("#email_error").hide();
	    $("#pass_error").hide();
	    $("#pass2_error").hide();		

	    // Check Out FocusOut Function
	    $("#admin_fname").focusout(function(){
			check_fname();
		});
		$("#admin_lname").focusout(function(){
			check_lname();
		});
		$("#admin_email").focusout(function(){
			check_email();
		});
		$("#admin_pass").focusout(function(){
			check_pass();
		});
		$("#admin_pass2").focusout(function(){
			check_repass();
		});

		// Functions to check 
		function check_fname(){
			var fname_length = $("#admin_fname").val().length;
			if(fname_length < 2 || fname_length > 30) {
				$("#fname_error").html("<i class='fa fa-close'></i> Please Enter Your First Name");
				$("#fname_error").show();
			}else{
				$("#fname_error").html("<i class='fa fa-check' style='color:green'></i>");
				$("#fname_error").show();
			}
		}
		function check_lname(){
			var lname_length = $("#admin_lname").val().length;
			if(lname_length < 2 || lname_length > 30){
				$("#lname_error").html("<i class='fa fa-close'></i> Please Enter Your Last Name");
				$("#lname_error").show();
			}else{
				$("#lname_error").html("<i class='fa fa-check' style='color:green'></i>");
				$("#lname_error").show();
			}
		}
		function check_email(){
			var email_length = $('#admin_email').val();
		 	var email_pattern = /^([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)@([0-9a-zA-Z]([-_\\.]*[0-9a-zA-Z]+)*)[\\.]([a-zA-Z]{2,9})$/;
		 	if(!email_pattern.test(email_length)){
		 		$('#email_error').html("<i class='fa fa-close'></i> Please Enter Valid Email Address.");
		 		$('#email_error').show();
		 	}
		 	else{
		 		$('#email_error').html("<i class='fa fa-check' style='color: green;'></i>");
				$("#email_error").show();
		 	}
		}
		function check_pass(){
		 	var pass_length = $("#admin_pass").val();
		 	var pass_pattern = /^[a-z0-9_-]{6,20}$/;
		 	if(!pass_pattern.test(pass_length)){
		 		$('#pass_error').html("<i class='fa fa-close'></i> Please Enter Your Password 6-20 characters");
		 		$('#pass_error').show();
		 	}
		 	else{
		 		$('#pass_error').html("<i class='fa fa-check' style='color: green;'></i>");
				$("#pass_error").show();
		 	}
		 }
		 function check_repass(){
		 	var pass_length = $("#admin_pass").val();
		 	var len_repass = $("#admin_pass2").val();
		 	var pass_pattern = /^[a-z0-9_-]{6,20}$/;
		 	if(pass_length != len_repass){
		 		$('#pass2_error').html("<i class='fa fa-close'></i> Passwords do not Match.");
		 		$('#pass2_error').show();
		 	}else{
		 		$('#pass2_error').html("<i class='fa fa-check' style='color:green'></i>");
		 		$('#pass2_error').show();
		 	}
		 }

		// Validation For Create Admin
		$('#login-error').hide();
		$("form.create-admin").on('submit', function(){
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