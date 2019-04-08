$(document).ready(function(){

    $('.teachers').on('click' , '.profesores' , function(e){

    	e.preventDefault();

    	var iduser = this.id;

    	var ruta1 = "/viewListFriends/"+iduser;

    	$(".options-profile").load(ruta1);

    });



});
