$(document).ready(function () {
/*
	$('.option-share').click(function(){


			var idClass = ($(this).attr("id"));
			var numberClass = idClass.length;

			if (numberClass > 0) {
				$('#label-friends').show();
			}

	});
*/

	$(".box-posts").on('click' , '#tag-friends' , function(){
		
		$('#label-friends').removeAttr("hidden");
		
	});

	$(".box-posts").on('input', '.post-txt', function(){

		var valorposttxt = $("#comment-txtarea").val();
		
		if (valorposttxt.trim().length > 0 ) {
			
			$("#btn-post").removeAttr("disabled");
			$("#btn-post").css("background" , "#ffb300");
			$("#btn-post").css("pointer-events" , "auto");

		}else{

			$("#btn-post").attr("disabled" , "disabled");
			$("#btn-post").css("background" , "#e0e0e0");
			$("#btn-post").css("pointer-events" , "none");
		}
	});

	$('.box-posts').on('submit', '.form-post', function(e){

		e.preventDefault();

		var iduserreceiver = $("input[name=iduserreceiver]").val();
		var textPost = $("textarea[name=text-post]").val();
		var optionsPost = $("select[name=options-post]").val();

		var datasend = {
			"iduserreceiver": iduserreceiver,
			"text-post": textPost,
			"options-post": optionsPost,
			"_token": $('#token').val(),
		};

		$.ajax({
			type: 'post',
			url: "/publicar",
			data: datasend,
			success: function(response)
			{
				$(".post-item").prepend(response['response']);
				$("#btn-post").attr("disabled" , "disabled").css("pointer-events" , "none").css("background" , "#e0e0e0");
				$("#comment-txtarea").val('');	
					
			}

		});

	});

});

function fileImagePost(){
	var preview = document.querySelector('img');
	var file    = document.querySelector('input[type=file]').files[0];
	
	var reader  = new FileReader();
	reader.onloadend = function(){
		$('#image-post').attr('src', e.target.result).addClass("image-post");
	}

	if (file) {
		reader.readAsDataURL(file);
	} else {
		preview.src = "";
	}
}




