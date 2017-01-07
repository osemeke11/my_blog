$(document).ready(function(e) {
	// Most Recent and most viewed Tab script
	$('#myTabs a').click(function (e) {
  		e.preventDefault();
  		$(this).tab('show');
  		$('#myTabs a[href="#popular"]').tab('show') // Select tab by name
		$('#myTabs a:first').tab('show') // Select first tab
	});


	// Greeting 
	var greeting;
	var nowDate = new Date();
	var nowHour = nowDate.getHours();
	if( nowHour < 12 ){
		greeting = "Good Morning, Welcome to naijaonlineparrot.com";
	}
	else if( nowHour < 17 ){
		greeting = "Good Afternoon, Welcome to naijaonlineparrot.com";
	}
	else{
		greeting = "Good Evening, Welcome to naijaonlineparrot.com";
	}
	
	$('.greeting').text(greeting);




	/*
	 *	Validation For Admin Login
	 */
	 $().on('submit', function(){
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
				$('#login-error').html(response);
			if(response === "no_errors") location.href = "index.php" ;
			}
		});
		return false;
	});
});