<title>Naija Online Parrot | Contact Us</title>
<!-- Introduction -->
<div class="container-fluid" id="intro">
	<div class="rows">
		<div class="col-md-9">
			<h1 class="title" data-selector="h1">Contact Us</h1>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>

<!-- Content -->
<div class="container-fluid" id="content">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="row">
				<!-- Main Content -->
				<div class="col-md-9 col-sm-8" id="main">
					<div id="contact" class="row">
						<div class="col-md-10 col-md-offset-1">
							<div class="row">
								<!-- Phone Number -->
								<div class="col-md-4 centered">
									<i class="fa fa-phone fa-2x"></i><br /><br />
									<p>+234-7064682596</p>
									<p>+234-8079035018</p>
								</div>	
								<!-- Email Address -->
								<div class="col-md-4 centered">
									<i class="fa fa-envelope fa-2x"></i><br /><br />
									<p>info@naijaonlineparot.com</p>
									<p>enquire@naijaonlineparrot.com</p>
								</div>
								<!-- Socials -->
								<div class="col-md-4 centered">
									<i class="fa fa-globe fa-2x"></i><br /><br />
									<p><i class="fa fa-facebook"></i> Naija Online Parrot</p>
									<p><i class="fa fa-twitter"></i> Naija Online Parrot</p>
									<p><i class="fa fa-instagram"></i> Naija Online Parrot</p>
								</div>
							</div>
						</div>
					</div>
					<div id="form">
					<!-- Form Input For Contact -->
						<form action="includes/contact.php" method="post" class="contact">
							<div class="row" style="padding-top: 40px;">
								<div class="col-md-7 col-md-offset-3 col-sm-7 col-sm-offset-2">
									<div id="login-error">
									</div>
									<div class="form-group">
										<label>Name: <span style="color:red;">*</span></label>
										<input type="text" class="form-control" name="name"  required />
									</div>
									<div class="form-group">
										<label>Email: <span style="color:red;">*</span></label>
										<input type="email" name="email" class="form-control" required />
									</div>
									<div class="form-group clear">
										<label>Message: <span style="color:red;">*</span></label>
										<textarea name="message" class="form-control" rows="8" cols="10" required="required"></textarea>
									</div>
									<input type="submit" name="submit" value="Send Message" class="btn btn-lg btn-primary" />
								</div>
							</div>
						</form>
					</div>
				</div>

<!-- Sidebar and Footer -->
<?php include "includes/sidebar.php"; ?>
<?php include "includes/footer.php"; ?>

<script type="text/javascript">
$(document).ready(function(e){
	 $('#login-error').hide();
	 $("form.contact").on('submit', function(){
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
				$('#login-error').show();
				$('#login-error').html(response);
			}
		});
		return false;
	});
});
</script>