$(document).ready(function(){

	$('.div-notFollow').on('click' , '.btn-follow' , function(e){

		var id = this.id;
		var iduserfollowed = $('#'+id).val();
		var textFollow = $('#'+id).text();

		e.preventDefault();
		if(textFollow == "seguir")
		{

			$.ajax({

				type: 'get',
				url: "/createFriendship/"+iduserfollowed,
				success: function(response)
						{
							$('#'+id).html("siguiendo");
							location.reload();

						}
			});

		}else{

			$.ajax({

				type: 'get',
				url: "/deleteFriendship/"+iduserfollowed,
				success: function(response)
						{
							$('#'+id).html("seguir");
						}


			});
		}

	});

	
});