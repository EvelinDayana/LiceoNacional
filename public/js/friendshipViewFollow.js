$(document).ready(function(){
		

	$('.div-box-follow').on('click','.btn-follower', function(e){

		e.preventDefault();
		var id = this.id;
		var iduserfollowed = $('#'+id).val();
		var textFollow = $('#'+id).text();
		
		if(textFollow == "Seguir")
		{

			$.ajax({

				type: 'get',
				url: "/createFriendship/"+iduserfollowed,
				success: function(response)
						{
							$('#'+id).html("Dejar de seguir");

						}
			});

		}else{

			$.ajax({

				type: 'get',
				url: "/deleteFriendship/"+iduserfollowed,
				success: function(response)
						{
							$('#'+id).html("Seguir");
						}


			});
		}

	});

	
});