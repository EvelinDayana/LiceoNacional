$(document).ready(function(){

	$('.post-item').on('click', '.link-like', function(){
	
		var idpostlike = $(this).val();
		var idcheckbox = this.id;
		var url;

		if($("#"+idcheckbox).is(':checked'))
		{
			url = "/likepublicacion/";
		}else{
			url = "/eliminarlike/";
		}
		
		$.ajax({

				type:'GET',				
				url: url+idpostlike,				
				success: function(response)
				{
				}
		});	
	});

});


