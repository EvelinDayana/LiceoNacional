$(document).ready(function(){


	$("#priceShortEvent").on("change" , function(){

		var text = $("#priceShortEvent").val();

		if (text == "no") 
		{
			$(".space-price-event-short").removeAttr("hidden");
			$(".input-short-event").removeAttr("hidden");
		}else{
			$(".space-price-event-short").attr("hidden" , "hidden");
			$(".input-short-event").attr("hidden" , "hidden");
		}

	});


	$(".image-short-event").mouseenter(function(){
        $(this).css("filter", "brightness(0.4)");

    });


    $(".image-short-event").mouseleave(function(){
        $(this).css("filter", "initial");
    });


    $('.close').on('click', function() {
    	$("#filePhotoShortEvent").val('');
    	$('.div-image-short-event').hide();
	});

	$(".close").mouseenter(function(){
        $(".image-short-event").css("filter", "brightness(0.4)");

    });


    $(".close").mouseleave(function(){
        $(".image-short-event").css("filter", "initial");
    });


    $(".form-short-event").on("click" , ".btn-submit-short-event" , function(e){
        
        e.preventDefault();

    	var typeUser = this.id;

    	var photo_event = $("#filePhotoShortEvent")[0].files[0];

    	
    	var name_event = $("#nameShortEvent").val();
    	var desc_event = $("#descriptionShortEvent").val();
    	var date_event_start = $("#dateShortEvent").val();
    	
    	var hour_event_start = $("#startTimeShortEvent").val();
    	
    	var price_event_select = $("#priceShortEvent").val();
    	var place_event = $("#placeShortEvent").val();

    	

    	var numberReg =  /^([0-9]{3,8})+$/;
    	var message = "El campo vacío no es permitido";


    	if (photo_event == undefined)
    	{
    		$('.div-message-photo').html(message);
    		
    	}else{
    		$('.div-message-photo').hide();
    	}

    	if (name_event == "")
    	{
    		$('.div-message-name').html(message);
    	}else{
    		$('.div-message-name').hide();
    	}

    	if (desc_event == "")
    	{
    		$('.div-message-desc').html(message);
    	}else{
    		$('.div-message-desc').hide();
    	}


    	if (price_event_select == "")
    	{
    		$('.div-message-price-short-select').html(message);

    	} else if (price_event_select == "si")
    	{
    		var price_event = "";

    	}else if (price_event_select == "no")
    	{
    		var price_event = $("#priceEventShort").val();

    		if (price_event == "") 
	    	{
	    		$(".div-message-price").html(message);

	    	}else if(!numberReg.test(price_event))
	    	{
	    		$('.div-message-price').html("El precio debe contener mínimo tres números");
	    	
	    	}else{

	    		$(".div-message-price").hide();
	    	}

    	}else{
    		$('.div-message-price-short-select').hide();
    	}

    	if (date_event_start == "")
    	{
    		$('.div-message-dateStart').html(message);
    	}else{
    		$('.div-message-dateStart').hide();
    	}


    	if (hour_event_start == "")
    	{
    		$('.div-message-hourStart').html(message);
    	}else{
    		$('.div-message-hourStart').hide();
    	}

    	if (place_event == "")
    	{
    		$('.div-message-place').html(message);
    	}else{
    		$('.div-message-place').hide();
    	}

    	var data = new FormData();

		data.append("photoEvent", photo_event);
		data.append("nameEvent", name_event);
		data.append("descriptionEvent", desc_event);
        data.append("priceEvent", price_event_select);
		data.append("price", price_event);
		data.append("startDateEvent", date_event_start);
		data.append("startTimeEvent", hour_event_start);
		data.append("placeEvent", place_event);
		data.append("_token", $("#token_short_event").val());

		
    	if (typeUser == "Docente" || typeUser == "Administrativo")
    	{

    		if (photo_event != undefined && name_event != "" && desc_event != "" && price_event != ""  && date_event_start != ""  && hour_event_start != "" && place_event != "" && price_event_select != "" && numberReg.test(price_event))
    		{
    			create_short_event(data);
    		}

    		if (photo_event != undefined && name_event != "" && desc_event != "" && price_event == "" && date_event_start != ""  && hour_event_start != "" && place_event != "" && price_event_select != "" && numberReg.test(price_event))
    		{
    			create_short_event(data);
    		}

    	}else{
    		alert("Usuario no permitido para realizar este proceso");
    	}

    });


});

function fileShortEvent(){

	var preview = document.querySelector('.image-short-event');
	var file    = document.querySelector('#filePhotoShortEvent').files[0];
	
	var reader  = new FileReader();

	reader.onload = function(e){
		$(".div-image-short-event").css("display" , "block");
		$('.image-short-event').attr('src', e.target.result).addClass("new-image-short-event");
	
	}

	if (file) {
		reader.readAsDataURL(file);
	} else {
		preview.src = "";
	}

}

function create_short_event(data)
{
	$.ajax({

		type:'POST',
        contentType: false,
        processData: false,
        method: 'post',
		data: data,
		url: '/crearEventoCorto',
		success: function(response)
		{
			var newClassSnackbar = document.getElementById("snackbar_shortEvent_message");
			newClassSnackbar.className = "show_short_event";
			setTimeout(function(){ newClassSnackbar.className = newClassSnackbar.className.replace("show_short_event", ""); }, 5000);	
			
			location.reload();
		}
    });
}