$(document).ready(function(){

	$('#div-profile-options').on('click', '.div-photo-user' , function(e){

		e.preventDefault();

		var iduser = $('#iduser-update-photo').val();
		var iduserauth = this.id;

		if (iduser == iduserauth) 
		{
			$('.div-photo-user').attr("data-toggle" , "modal").attr("data-target" , "#change-photo-profile").removeAttr("href");

		}else{
			$('.div-photo-user').removeAttr("data-toggle").removeAttr("data-target").attr("href" , "/perfil/1");
		}

	});


	$('.form-user-update').on('click' , '.btn-form-configuration', function(e){

		e.preventDefault();

		var btn = $(this);
		var ruta =  "/amigos/"+this.id;

		var name_user_update = $('#name-user-update').val();
		var lastname_user_update = $('#lastname-user-update').val();

		var name = $('#form-name').val();
		var lastname = $('#form-lastname').val();


		if (name_user_update !=  name || lastname_user_update != lastname)
		{

			var datasend = {
				"name-update": name,
				"lastname-update": lastname,
				"_token": $('#token').val(), 
			};

			$.ajax({

				type:'POST',
				data: datasend,
				url: '/actualizar',
				success: function(response){

					$('button').data({loadingText: 'Guardando...'});
	   				btn.button('loading');
	   				btn.css("cursor" , "pointer");
	    			setTimeout(function () {
	       				btn.button('reset');
	    			}, 500);

					location.reload();

					setTimeout(function(){
	    				$('#configuration').modal('hide');
					}, 500);	
					


					$('#form-password').val('');
				}

			});

		}else{
			$('#configuration').modal('hide');
			$('#form-password').val('');
		}


		

	});


	$('.form-update-password').on('click' , '#btn-change-password' , function(e){

		e.preventDefault();

		var password_confirmation= $('#update-password-conformation').val();
		var new_password= $('#update-new-password').val();
		var old_password= $('#update-old-password').val();

		var datasend = {
			"old_password": old_password,
			"new_password": new_password,
			"password_confirmation": password_confirmation,
			"_token": $('#token').val(),
			};

		


		if (new_password.length >= 6) 
		{
			if(new_password == password_confirmation)
			{
				
				$.ajax({

					type: 'POST',
					data: datasend,
					url: '/actualizarContraseña',
					success: function(response){

						if(response['response'] == 'success'){
											
	    					$('#change-password').modal('hide');
	    					$('#change-password').find('input').val('').end();
	    					$('.password-old-incorrect').empty();
	    					$('.box-message').empty();
	    					$('.message').empty(); 
	    					$('.password-new-incorrect').empty();
	    					$('#form-password').val(new_password);

						}

						if (response['response'] == 'password_fail') 
						{							
							$(".password-old-incorrect").html("Su contraseña actual no es válida");
						}

						if(response['response'] == 'error'){
							
							$(".box-message").html("La contraseña no puede ser igual a la anterior");
							
						}
					}

				});

			}else{
				$(".password-new-incorrect").html("Las dos contraseñas deben ser iguales para confirmar");
			}
		}else{
			$(".box-message").html("La contraseña debe tener como minimo seis caracteres");
		}
		

	});

	$(".form-update-password").on("input" , "#update-password-conformation , #update-new-password" , function(){

		var password_confirmation= $('#update-password-conformation').val();
		var new_password= $('#update-new-password').val();
		var old_password= $('#update-old-password').val();


		if(password_confirmation.length > 0 && new_password.length > 0)
		{
			if (password_confirmation == new_password) 
			{
				$(".password-new-incorrect").css("display", "block");
				$(".password-new-incorrect").html("Las contraseñas coinciden");
				$(".password-new-incorrect").css("color" , "#009688");
				$(".password-new-incorrect").css("font-weight" , "bold");

			}else{

				$(".password-new-incorrect").html("Las contraseñas no coinciden");
				$(".password-new-incorrect").css("color" , "#F44336");
				$(".password-new-incorrect").css("display", "block");

			}

		}else{
			$(".password-new-incorrect").css("display", "none");
		}

	});

});


function previewFile() {
	var preview = document.querySelector('img');
	var file    = document.querySelector('input[type=file]').files[0];
	
	var reader  = new FileReader();
	reader.onload = function (e) {
		$('#image-user').attr('src', e.target.result).addClass("image-user-update");
	}

	if (file) {
		reader.readAsDataURL(file);
	} else {
		preview.src = "";
	}
}

	