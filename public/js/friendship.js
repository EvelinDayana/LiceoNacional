$(document).ready(function(){

	$('.btn-follow').click(function(e){

		var iduserfollowed = $('.btn-follow').val();
		var textFollow = $('.btn-follow').text();

		e.preventDefault();
		if(textFollow == "seguir")
		{

			$.ajax({

				type: 'get',
				url: "/createFriendship/"+iduserfollowed,
				success: function(response)
						{
							$(".btn-follow").html("siguiendo");

						}
			});

		}else{

			$.ajax({

				type: 'get',
				url: "/deleteFriendship/"+iduserfollowed,
				success: function(response)
						{
							$(".btn-follow").html("seguir");
						}


			});
		}

	});

	
});