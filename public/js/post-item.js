$(document).ready(function(){
	

	$(".post-item").on('input', '.textarea3', function(){

		var idtxt = this.id;


		var valor = $(".comment-txt-"+idtxt).val();
		
		
		if (valor.trim().length > 0 ) {
			
			$("#btn-submit-link-"+idtxt).removeAttr("disabled");
			$("#btn-submit-link-"+idtxt).addClass("btn-submit2");
			$("#btn-submit-link-"+idtxt).css("pointer-events" , "auto");

		}else{

			$("#btn-submit-link-"+idtxt).attr("disabled" , "disabled");
			$("#btn-submit-link-"+idtxt).removeClass("btn-submit2");
			$("#btn-submit-link-"+idtxt).css("cursor" , "default");
		}
	});

	


	$(".post-item").on('click', '.link-comment', function(e){

		e.preventDefault();
		
		$(".link-comment").css("cursor" , "pointer");
		textarea = $(".comment-txt-"+this.id);
        textarea.focus();

	});



	$(".post-item").on('submit', '.formulario', function(e){
	
		e.preventDefault();

		var idform = this.id;

		var idpost = $("#postid-"+idform).val();
		var comment = $(".comment-txt-"+idform).val();

		var datasend = {
			"postid": idpost,
			"comment": comment,
			"_token": $('#token').val(),
		};

		$.ajax({

			type: "GET",
			data: datasend,
			url: '/comentar',
			success: function(response){

				$("#all_comments-"+idform).append(response['response']);
				$("#btn-submit-link-"+idform).attr("disabled" , "disabled").css("cursor" , "default").removeClass("btn-submit2").blur();
				$(".comment-txt-"+idform).val('');				
			}

		});

	});


	$('.post-item').on('click', '.delete-p', function(e){

		e.preventDefault();

		var message = confirm("¿Realmente deseas eliminar la publicación?");
		
		if(message == true){

			var idpost = this.id;

			$.ajax({

				type: 'GET',
				url: "/eliminarpublicacion/"+this.id,
				success: function(response){
					$('#dp-'+idpost).remove();
				}
			});
	
		}

	});



});


