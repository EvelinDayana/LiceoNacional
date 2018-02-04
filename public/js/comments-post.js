$(document).ready(function(){


	$('.post-item').on('mouseenter', '.header-post-comment', function() {
		$(".btn-comment-"+this.id).css("display", "block");
	});


	$('.post-item').on('mouseleave', '.header-post-comment', function() {
		$(".btn-comment-"+this.id).css("display", "none");
	});



	$('.post-item').on('click', '.delete-c', function(e){
		e.preventDefault();
 			
		var textbutton = confirm("¿Realmente deseas eliminar el comentario?");

		if (textbutton == true) 
		{
			var idcom = this.id;

			$.ajax({

				type: 'GET',
				url: "/eliminarcomentario/"+this.id,				
				success: function(response){
					$('.dc-'+idcom).remove();									
				}

			});			

		}

	});




});
