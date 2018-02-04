$(document).ready(function(){

    var iduser = $("#iduser").val();
    var ruta =  "/viewProfile/"+iduser;
    
    $(".options-profile").load(ruta);

    $('#options-bar a').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
    });


    $('.link-presentation').on('click' , '.href-profile' , function(e){
    	e.preventDefault();

    	    $(".options-profile").load(ruta);

    });

    $('.link-presentation').on('click' , '.href-information' , function(e){
    	e.preventDefault();

    	$(".options-profile").load("/information");

    });

    $('.link-presentation').on('click' , '.href-friends' , function(e){
        e.preventDefault();

        var ruta = "/viewListFriends/"+iduser;

        $(".options-profile").load(ruta);

    });

});