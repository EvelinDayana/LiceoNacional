$(document).ready(function(){
	
	var post_id;
	var idusertransmitter;
	var iduserauth;
	var iduserreceiver;
	

	$(".post-item").on("click", ".delete-p" , function(){
		post_id = (this.id);
		iduserreceiver= $("#"+post_id).val();
		idusertransmitter = $("#idusertransmitter-"+post_id).val();
		iduserauth = $("#idusertransmitter-"+post_id).attr("class");
		
		
		if (idusertransmitter == iduserauth || iduserreceiver == iduserauth)
		{
			$('#myModal').modal('show');
		}else{
			$('#warning').modal('show');
		}
	});


	$(".post-item").on("click" , ".btn-delete-modal" , function(e){
		e.preventDefault();

		var message = $("#btn-"+post_id).text();
  		
		if (idusertransmitter == iduserauth || iduserreceiver == iduserauth)
		{

			if(message == "Eliminar"){

				var idpost = post_id;

				$.ajax({

					type: 'GET',
					url: "/eliminarpublicacion/"+idpost,
					success: function(response){
						$('#myModal').modal('hide');
						$('#dp-'+post_id).remove();
					}

				});

			}

		}else{
			if(response['response'] == false)
			{
				$('#warning').modal('show');
			}
		}

	});

	$(".post-item").on('input', '.textarea3', function(){

		var idtxt = this.id;

		var valor = $(".comment-txt-link-"+idtxt).val();
		
		
		if (valor.trim().length > 0 ) {
			
			$(".btn-submit-comment-"+idtxt).removeAttr("disabled");
			$(".btn-submit-comment-"+idtxt).addClass("btn-submit2");
			$(".btn-submit-comment-"+idtxt).css("pointer-events" , "auto");

		}else{

			$(".btn-submit-comment-"+idtxt).attr("disabled" , "disabled");
			$(".btn-submit-comment-"+idtxt).removeClass("btn-submit2");
			$(".btn-submit-comment-"+idtxt).css("cursor" , "default");
		}
	});

	


	$(".post-item").on('click', '.link-comment', function(e){

		e.preventDefault();
		
		$(".link-comment").css("cursor" , "pointer");
		textarea = $(".comment-txt-link-"+this.id);
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
			"_token": $('#token_comment_'+idform).val(),
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

});


