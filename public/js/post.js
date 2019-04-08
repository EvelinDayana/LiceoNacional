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
		var photoPost = $('#file-image-post')[0].files[0];
		var documentpost = $("#file-document-post")[0].files[0];
		var documentposts;
		var photoPosts;

		if (photoPost == "") {

			photoPosts = "";

		}else{
			photoPosts = photoPost;

		}

		if (documentposts == "") 
		{
			documentposts == "";
		}else{
			documentposts = documentpost;
		}

		var data = new FormData();
		data.append("file-photo-post", photoPosts);
		data.append("file-doc-post", documentposts);
		data.append("iduserreceiver", iduserreceiver);
		data.append("text-post", textPost);
		data.append("options-post", optionsPost);
		data.append("_token", $('#token_post').val());

		$.ajax({
			url: "/publicar",
			data: data,
			contentType: false,
			processData: false,
			method: 'post',
			type: 'post',
			success: function(response)
			{

				$(".post-item").prepend(response['response']);
				$("#btn-post").attr("disabled" , "disabled").css("pointer-events" , "none").css("background" , "#e0e0e0");
				$("#comment-txtarea").val('');	
				$(".select-post").val("");
				$("#file-image-post").val("");
				$("#file-document-post").val("");
				$(".div-image").css("display" , "none");
					
			}

		});

		

	});

	$(".image-post-file").mouseenter(function(){
        $(this).css("filter", "brightness(0.4)");

    });


    $(".image-post-file").mouseleave(function(){
        $(this).css("filter", "initial");
    });


    $('.close').on('click', function() {
    	$("#file-image-post").val('');
    	$('.div-image').hide();
	});

	document.getElementById('file-document-post').onchange = function () {
  		var file = document.getElementById('file-document-post'); 
  		var name = file.files.item(0).name;
  		$(".div-document").css("display" , "block");
  		$(".name-document").html(name).addClass("document-post");
      	
	};

	$('#close-document').on('click', function() {
    	$("#file-document-post").val('');
    	$('.div-document').hide();
	});

});

function fileImagePost(){
	var preview = document.querySelector('.image-post-file');
	var file    = document.querySelector('#file-image-post').files[0];
	
	var reader  = new FileReader();
	reader.onload = function(e){
		$(".div-image").css("display" , "block");
		$('.image-post-file').attr('src', e.target.result).addClass("image-post");
	}

	if (file) {
		reader.readAsDataURL(file);
	} else {
		preview.src = "";
	}

	var photo_post = $('#file-image-post').val();

	if (photo_post.length > 0 ) {
			
		$("#btn-post").removeAttr("disabled");
		$("#btn-post").css("background" , "#ffb300");
		$("#btn-post").css("pointer-events" , "auto");
		$("#comment-txtarea").attr("placeholder" , "Escribe una descripción de la foto aquí...");

	}else{

		$("#btn-post").attr("disabled" , "disabled");
		$("#btn-post").css("background" , "#e0e0e0");
		$("#btn-post").css("pointer-events" , "none");
		$("#comment-txtarea").attr("placeholder" , "Escribe tu comentario...")
	}
}
