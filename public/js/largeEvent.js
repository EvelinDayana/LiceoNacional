$(document).ready(function(){


	$("#priceEvent").on("change" , function(){

		var text = $("#priceEvent").val();

		if (text == "no") 
		{
			$(".space-price-event-large").removeAttr("hidden");
			$(".input-price-large-event").removeAttr("hidden");

		}else{

			$(".space-price-event-large").attr("hidden" , "hidden");
			$(".input-price-large-event").attr("hidden" , "hidden");
		}

	});

	$(".image-large-event").mouseenter(function(){
        $(this).css("filter", "brightness(0.4)");

    });


    $(".image-large-event").mouseleave(function(){
        $(this).css("filter", "initial");
    });




    $('.close').on('click', function(){
    	$("#filePhotoLargeEvent").val('');
    	$('.div-image-event').hide();
	});

	$(".close").mouseenter(function(){
        $(".image-large-event").css("filter", "brightness(0.4)");

    });


    $(".close").mouseleave(function(){
        $(".image-large-event").css("filter", "initial");
    });


    $(".form-large-event").on("click" , ".btn-submit-large-event" , function(e){
        
        e.preventDefault();

    	var typeUser = this.id;

        
    	var photo_event = $("#filePhotoLargeEvent")[0].files[0];
    	var name_event = $("#nameEvent").val();
    	var desc_event = $("#descriptionEvent").val();
    	var date_event_start = $("#dateEventStart").val();
    	var date_event_finish = $("#dateEventFinish").val();
    	var hour_event_start = $("#startTimeEvent").val();
    	var hout_event_finish = $("#finishTimeEvent").val();
    	var price_event_select = $("#priceEvent").val();

    	var place_event = $("#placeEvent").val();

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


    	if (price_event_select == "no")
    	{
    		var price_event = $("#priceEventLarge").val();

        }else{
            var price_event = 0;
        }


		if (price_event_select == "")
        {
            $('.div-message-price-large-select').html(message);

        } else if (price_event_select == "si")
        {
            var price_event = "";

        }else if (price_event_select == "no")
        {
            var price_event = $("#priceEventLarge").val();

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

        }$('.div-message-price-large-select').hide();

    	
    	if (date_event_start == "")
    	{
    		$('.div-message-dateStart').html(message);
    	}else{
    		$('.div-message-dateStart').hide();
    	}

    	if (date_event_finish == "")
    	{
    		$('.div-message-dateFinish').html(message);
    	}else{
    		$('.div-message-dateFinish').hide();
    	}

    	if (hour_event_start == "")
    	{
    		$('.div-message-hourStart').html(message);
    	}else{
    		$('.div-message-hourStart').hide();
    	}

    	if (hout_event_finish == "")
    	{
    		$('.div-message-hourFinish').html(message);
    	}else{
    		$('.div-message-hourFinish').hide();
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
    		data.append("finishDateEvent", date_event_finish);
    		data.append("startTimeEvent", hour_event_start);
    		data.append("finishTimeEvent", hout_event_finish);
    		data.append("placeEvent", place_event);
    		data.append("_token", $("#token_large_event").val());


    	if (typeUser == "Docente" || typeUser == "Administrativo")
    	{

    		if (photo_event != undefined && name_event != "" && desc_event != "" && price_event != ""  && date_event_start != "" && date_event_finish != "" && hour_event_start != "" && hout_event_finish != "" && place_event != "" && price_event_select != "" && numberReg.test(price_event))
    		{
    			create_large_event(data);
    		}

            if (photo_event != undefined && name_event != "" && desc_event != "" && price_event == ""  && date_event_start != "" && date_event_finish != "" && hour_event_start != "" && hout_event_finish != "" && place_event != "" && price_event_select != "" && numberReg.test(price_event))
            {
                create_large_event(data);
            }


    	}else{
    		alert("Usuario no permitido para realizar este proceso");
    	}

    });
   

});

function fileLargeEvent(){

	var preview = document.querySelector('.image-large-event');
	var file    = document.querySelector('#filePhotoLargeEvent').files[0];
	
	var reader  = new FileReader();

	reader.onload = function(e){
		$(".div-image-event").css("display" , "block");
		$('.image-large-event').attr('src', e.target.result).addClass("new-image-large-event");
	
	}

	if (file) {
		reader.readAsDataURL(file);
	} else {
		preview.src = "";
	}

}

function create_large_event(data)
{
    $.ajax({

        type:'POST',
        contentType: false,
        processData: false,
        method: 'post',
        data: data,
        url: '/crearEventoLargo',
        success: function(response)
        {
            var newClassSnackbar = document.getElementById("snackbar_largeEvent_message");
            newClassSnackbar.className = "show_large_event";
            setTimeout(function(){ newClassSnackbar.className = newClassSnackbar.className.replace("show_large_event", ""); }, 5000);   

            window.location.reload("/crearEvento");
        }
    });
}