
$(document).ready(function(){

		$('#logout_txt').click(function(){
			$.ajax({   
				type: "GET",   
				url: "proce.php",   
				data: {flag : "logout"}   
			}).done(function( msg ) {   
				if(msg=="logout"){
					$(location).attr('href',"index.php");
				}
			});  
		});

	);
