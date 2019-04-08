$(document).ready(function(){

	var commentIdDelete;
	var iduserauth;
	var idusertransmitter;
	var iduserreceiver;
	var idusercomment;



	$(".post-item").on("click", ".delete-c" , function(){

		commentIdDelete = (this.id);
		iduserauth = $("#idusers-"+commentIdDelete).attr("class");
		iduserreceiver = $("#idusers-"+commentIdDelete).val();
		idusertransmitter = $(this).val();
		idusercomment = $("#idusercommment-"+commentIdDelete).val();

		
		if (idusertransmitter == iduserauth || iduserreceiver == iduserauth || idusercomment == iduserauth)
		{
			$('#delete-comment').modal('show');
		}else{
			$('#warning').modal('show');
		}

	});


	$('.post-item').on('click', '.btn-delete-modal-comment', function(e){
		e.preventDefault();
		console.log("hola")
 			
		var textbutton = $("#btn-"+commentIdDelete).val();

		if (idusertransmitter == iduserauth || iduserreceiver == iduserauth || idusercomment == iduserauth)
		{

			if (textbutton == "eliminar") 
			{

				var idcom = commentIdDelete;

				$.ajax({

					type: 'GET',
					url: "/eliminarcomentario/"+idcom,				
					success: function(response){

						$('#delete-comment').modal('hide');
						$('.dc-'+commentIdDelete).remove();									
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



	$('.post-item').on('mouseenter', '.header-post-comment', function() {
		
		var validate = $(".btn-comment-"+this.id).attr("id");

		if (!validate)
		{

			$(".btn-comment-"+this.id).css("display", "none");
		}else{
			
			$(".btn-comment-"+this.id).css("display", "block");
		}


			
	});


	$('.post-item').on('mouseleave', '.header-post-comment', function() {
			
			$(".btn-comment-"+this.id).css("display", "none");
			

	});

});
