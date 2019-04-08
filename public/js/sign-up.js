$(document).ready(function () {

	$("select").on('change' , function(){

		 var text = $("select[name=typeUser]").val();
		 var text1 = $("select[name=state]").val();
		 var text2= $("select[name=emphasis]").val();
		 var z = text1.length;

		 if (text == "Docente" || text == "Administrativo" ) {

		 	$("#sign-up1").css("display" , "block");
		 	$("#sign-up2").css("display" , "none");
		 	$("#sign-up4").css("display" , "none");
		 	$("#emphasis").removeAttr("required");
		 	$("#state").removeAttr("required");
		 	$("#input-sex-fem").attr("required","true");
		 	$("#input-sex-masc").attr("required","true");

		 }else if (text == "Estudiante") {

		 	$("#sign-up1").css("display" , "none");
		 	$("#sign-up2").css("display" , "block");
		 	$("#sign-up4").css("display" , "block");
		 	$("#emphasis").attr("required","true");
		 	$("#state").attr("required","true");
		 	$("#input-sex-fem").removeAttr("required");
		 	$("#input-sex-masc").removeAttr("required");

		 }

		if ((text=="Docente" || text == "Administrativo" ) && (text1=="Alumna" || text1 == "Ex alumna")) {
			
			$("#sign-up4").css("display" , "none");
		}

		if (text=="") {
			$("#sign-up1").css("display" , "none");
			$("#sign-up2").css("display" , "none");
			$("#sign-up4").css("display" , "none");
		}

	});

	$("#formulario").on("click" , "#btn-signUp" , function(e){

		e.preventDefault();

		var name = $("#name").val();
		var lastname = $("#lastname").val();
		var doc = $("#document").val();
		var tel = $ ("#phone").val();
		var email = $("#email").val();
		var password = $("#password").val();
		var date = $("#date").val();
		var typeUser = $("#type-user").val();
		var sex =  $("input[name = 'sex']").val();
		var state = $("#sate").val();
		var emphasis = $("#emphasis").val();


		$("#name").attr("required","true");

		var textReg = /^([A-Za-z]\s?)+$/;
    	var numberReg =  /^([0-9]{8,15})+$/;
    	var passwordReg = /^([0-9a-zA-Z]{6,15})+$/;
    	var phoneReg = (/^(3([012]\d{2})\s?\d{3}\s?\d{3})+$/);
    	var emailReg = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    	
    	var array = new Array(doc, name, lastname, email, password, tel, date, typeUser, emphasis, sex, state);
    	var message = "El campo vacío no es permitido";

    	if(array[0] == ""){
            $('.div-document').html(message);
        }else if (!numberReg.test(doc)){
        	$('.div-document').html("El documento debe contener mínimo ocho números");
        }else{
        	$('.div-document').hide();
        }

        if (array[1] == "") {
        	$('.div-name').html(message);
        }else if(!textReg.test(name)){
        	$('.div-name').html("El nombre debe contener sólo letras");
        }else{
        	$('.div-name').hide();
        }

        if (array[2] == "") {
        	$('.div-lastname').html(message);
        }else if(!textReg.test(lastname)){
        	$('.div-lastname').html("El apellido debe contener sólo letras");
        }else{
        	$('.div-lastname').hide();
        }

        if (array[3]== "") {
        	$('.div-email').html(message);
        }else if(!emailReg.test(email)){
        	$('.div-email').html("El correo electrónico debe estar escrito de la forma ejemplo@ejemplo.com");
        }else{
        	$('.div-email').hide();
        }

        if (array[4]== "") {
        	$('.div-password').html(message);
        }else if(!passwordReg.test(password)){
        	$('.div-password').html("La contraseña debe contener mínimo 6 caracteres y deben ser números y letras");
        }else{
        	$('.div-password').hide();
        }

        if (array[5] == "") {
        	$('.div-phone').html(message);
        }else if(!phoneReg.test(tel)){
        	$('.div-phone').html("El número no es permitido");
        }else{
        	$('.div-phone').hide();
        }

        if (array[6] == "") {
        	$('.div-date').html(message);
        }else{
        	$('.div-date').hide();
        }


        if (array[7] == "") {
        	$('.div-typeuser').html(message);
        }else{
        	$('.div-typeuser').hide();
        }


        if (array[8] == "") {
        	$('.div-emphasis').html(message);
        }else{
        	$('.div-emphasis').hide();
        }

        if (array[9] == "") {
        	$('.div-sex').html(message);
        }else{
        	$('.div-sex').hide();
        }


        if (array[10] == "") {
        	$('.div-state').html(message);
        }else{
        	$('.div-state').hide();
        }

        if (numberReg.test(doc) && textReg.test(name) && textReg.test(lastname) && emailReg.test(email) && passwordReg.test(password) && phoneReg.test(tel) && (date != "") && (typeUser != "")) 
        {

        	$.ajax({

				type: 'POST',
				data: $("#formulario").serialize(),
				url: '/registrarse',
				success: function(response){

					if(response['response'] == 'success'){
						
						window.location.reload("/");

					}

				}

			});

        }


        
	
	});


	

});

