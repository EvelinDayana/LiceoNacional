$(document).ready(function() {

	var count_posts = $("#count_posts").val();
	var count_followers = $("#count_followers").val();
	var follows = $("#follows").val();

	if (count_posts > 0)
	{
		$(".post-item-dashboard-empty").hide();
	}else{
		$(".post-item-dashboard-empty").show();
	}

	if (count_followers > 0 )
	{
		$(".content-card-message").css('display' , 'none');
		$(".content-card").css('display' , 'block');
		$("#link-notFollow").removeAttr("disabled");


	}else{
		$(".content-card-message").css('display' , 'block');
		$(".content-card").css('display' , 'none');
		$("#link-notFollow").attr("disabled" , "disabled");
	}

	$("#link-notFollow").click(function(e){
		e.preventDefault();

		if (count_followers>0) 
		{
			$(".content-card-deploy").slideToggle();

		}else{
			$("#link-notFollow").attr("disabled" , "disabled");
		
		}

		if (count_followers == 1)
		{
			$(".message-warning").css("display" , "block");
		}else{
			$(".message-warning").css("display" , "none");
		}
	});

	

});
		

	