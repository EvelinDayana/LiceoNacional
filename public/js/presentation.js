$(document).ready(function(){

    var iduser = $("#iduser").val();
    var authId = $("#AuthId").val();

    var ruta =  "/viewProfile/"+iduser;
    var remove_link_edit_data = $(".link-edit-data").remove();

    if (iduser != authId) 
    {
        var remove_authId = $("#AuthId").remove();
    }else{
        $(".div-name-presentation").append(remove_link_edit_data);
    }


    $('#options-bar a').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
    });


    $('.link-presentation').on('click' , '.href-information' , function(e){
    	e.preventDefault();

        var ruta1 = "/viewInformation/"+iduser;

    	$(".options-profile").load(ruta1);
        
    });

    $('.link-presentation').on('click' , '.href-friends' , function(e){
        e.preventDefault();

        var ruta = "/viewListFriends/"+iduser;

        $(".options-profile").load(ruta);

    });

    /*$('.link-presentation').on('click' , '.href-event' , function(e){
        e.preventDefault();

        var ruta = "/viewListEvents/"+iduser;

        $(".options-profile").load(ruta);

    });*/

});