$(document).ready(function(){

	$('.events-tabs a').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
    });

    var ruta1 = "/largeEvent";

 

    $('.create').on('click' , '.large-event' , function(e){
        e.preventDefault();

        $(".content-modal-body-events").load("/largeEvent");

    });

    $('.create').on('click' , '.short-event' , function(e){
        e.preventDefault();

        var ruta2 = "/shortEvent";

        $(".content-modal-body-events").load("shortEvent");

    });

    
});
