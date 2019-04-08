$(document).ready(function(){

    var iduser = $("#iduser").val();
    var ruta1 = "/seguidores/"+iduser;

	$("#content-links-follows").load(ruta1);

	$('.options-tabs a').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
    });

    $('.sub-div-box-follow').on('click' , '.link-follower' , function(e){
        e.preventDefault();

        $("#content-links-follows").load(ruta1);

    });

    $('.sub-div-box-follow').on('click' , '.link-followed' , function(e){
    	e.preventDefault();

        var ruta = "/seguidos/"+iduser;
    	$("#content-links-follows").load(ruta);

    });

    

})