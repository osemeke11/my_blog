<!-- Includes Header -->
<?php include 'includes/header.php'; 
	
	$email = $_SESSION['admin'];
?>

<!-- Change Password -->
<div class="col-md-10" id="dash-content">
	<div class="container-fluid">
		<h2 class="text-primary">Change Password</h2>
		<div id="login-error"></div>
		<form method="post" action="includes/form_validation_process.php" id="change_pass" class="change_pass">
			<div class="form-group row">
				<label class="col-md-2">Current Password</label>
				<input type="password" name="cur_pass" class="form-normal col-md-3" id="cur_pass">
				<span class="col-md-5 form-error" id="cur_pass_error"></span>
			</div>
			<div class="form-group row">
				<label class="col-md-2">New Password</label>
				<input type="password" name="new_pass" class="form-normal col-md-3" id="new_pass">
				<span class="col-md-5 form-error" id="new_pass_error"></span>
			</div>
			<div class="form-group row">
				<label class="col-md-2">Retype New Password</label>
				<input type="password" name="new_pass2" class="form-normal col-md-3" id="new_pass2">
				<span class="col-md-5 form-error" id="new_pass_error2"></span>
			</div>
			<div class="form-group row">
				<input type="submit" name="change_pass" class="btn btn-success col-md-offset-2" value="Change Password" id="change_pass">
			</div>
		</form>
	</div>
</div>

<!-- Includes Footer -->
<?php include 'includes/footer.php'; ?>

<script type="text/javascript">
	$(document).ready(function(){
		/*
		 * Change Password Confirmation
		 */
		 $('#cur_pass_error').hide();
		 $('#new_pass_error').hide();
		 $('#new_pass_error2').hide();

		 var cur_pass_error = false;
		 var new_pass_error = false;
		 var new_pass_error2 = false;

		 // Focus Validation
		$("#cur_pass").focusout(function(){
			check_cur_pass();
		});

		$("#new_pass").focusout(function(){
			check_new_pass();
		});

		$("#new_pass2").focusout(function(){
			check_new_pass2();
		});

		// Function To Validate 

		function check_cur_pass(){
			var cur_pass = $('#cur_pass').val().length;
			if (cur_pass < 6) {
				$('#cur_pass_error').html("<i class='fa fa-clear'></i> Password must contains atleast 6 characters.");
				$('#cur_pass_error').show();
			}
			else{
				$('#cur_pass_error').html("<i class='fa fa-check' style='color:green'></i>");
				$('#cur_pass_error').show();
			}
		}

		function check_new_pass(){
			var new_pass = $('#new_pass').val().length;
			if (new_pass < 6) {
				$('#new_pass_error').html("<i class='fa fa-clear'></i> Password must contains atleast 6 characters.");
				$('#new_pass_error').show();
			}
			else{
				$('#new_pass_error').html("<i class='fa fa-check' style='color:green'></i>");
				$('#new_pass_error').show();
			}
		}

		function check_new_pass2(){
			var new_pass = $('#new_pass').val();
			var new_pass2 = $('#new_pass2').val();
			if(new_pass != new_pass2){
				$('#new_pass_error2').html("<i class='fa fa-clear'></i> Passwords don't match!");
				$('#new_pass_error2').show();
			}
			else{
				$('#new_pass_error2').html("<i class='fa fa-check' style='color:green'></i>");
				$('#new_pass_error2').show();
			}
		}

		$("#change_pass").submit(function(){
			
			cur_pass_error = false;
			new_pass_error = false;
			new_pass_error2 = false;
			
			check_cur_pass();
			check_new_pass();
			check_new_pass2();

			if(cur_pass_error == false || new_pass_error == false || new_pass_error2 == false){
				return true;
			}
			else{
				return false;
				 e.preventDefault();
			}
		});

		// Validate The Change Form
		$('#login-error').hide();
		$("form.change_pass").on('submit', function(){
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