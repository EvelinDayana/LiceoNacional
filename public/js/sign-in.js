$(document).ready(function(){


	$("#btn-signin").click(function(){

		var email = $("input[name=email]").val();
		var passuser = $("input[name=password").val();


		$('button').data({loadingText: 'Ingresando...'});

		if (email === "" || passuser === "") {


		}else{

			var btn = $(this);
   			btn.button('loading');
   			btn.css("cursor" , "pointer");
    		setTimeout(function () {
       			btn.button('reset');

    		}, 1500);

			var datasend = {
			"email": email,
			"password": passuser,
			"_token": $('#token').val() 
			};



			$.ajax({

				type: 'POST',
				data: datasend,
				url: '/iniciar',
				success: function(response){

					if(response['response'] == 'success'){
						
						window.location.replace("/");
						
					}else{
						$("#hl").css("margin-top" , "5px");
						$(".forget-div").css("margin-top" , "17px");
						$("#hl").html(response['response']).delay(1500);
					}


				}

			});

		}


		$("#form-signin").submit(function(){
			return false;
			
		});

	});


});

	



	

		

