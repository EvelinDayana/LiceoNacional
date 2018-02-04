$(document).ready(function(){

    var iduser = $("#iduser").val();
    var ruta = "/seguidores/"+iduser;

	//$("#content-links-follows").load(ruta , "" ,".div-box-follower");

	$('.options-tabs a').click(function(){
        $(this).addClass('active').siblings().removeClass('active');
    });

    $('.sub-div-box-follow').on('click' , '.link-followed' , function(e){
    	e.preventDefault();

    	$("#content-links-follows").load("/seguidos .div-box-follower");

    });

    $('.sub-div-box-follow').on('click' , '.link-follower' , function(e){
    	e.preventDefault();

    	$("#content-links-follows").load(ruta , "" ,".div-box-follower");

    });

})