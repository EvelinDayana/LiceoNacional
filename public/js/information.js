$(document).ready(function(){

	var typeUser = $("#typeUser").val();
	var stateUser = $("#userState").val();
	var authid = $("#authid").val();
	var userid = $("#userid").val();

	$("#typeUser").remove();
	$("#userState").remove();
	$("#authid").remove();
	$("#userid").remove();


	var hidden_edit_academic = $(".link-edit-academic-information").remove();
	var hidden_edit_data = $(".link-edit-data").remove();
	var hidden_edit_location = $(".link-edit-location").remove();
	var hidden_edit_record = $(".link-edit-record").remove();

	if (authid != userid)
	{
		var hidden_edit_academic = $(".link-edit-academic-information").remove();
		var hidden_edit_data = $(".link-edit-data").remove();
		var hidden_edit_location = $(".link-edit-location").remove();
		var hidden_edit_record = $(".link-edit-record").remove();

	}else{

		$(".edit-title-box-academic-information").append(hidden_edit_academic);
		$(".edit-title-box-data").append(hidden_edit_data);
		$(".edit-title-box-location").append(hidden_edit_location);
		$(".edit-title-box-record").append(hidden_edit_record);

	}


	if (typeUser == "Docente" || typeUser == "Administrativo") 
	{
		$(".box-academic-information").remove();

	}

	if (typeUser == "Estudiante" && stateUser == "Alumna") 
	{
		$(".box-record").remove();
	}

	if (typeUser == "Estudiante" && stateUser == "Ex alumna") 
	{
		$(".box-record").append();
	}


	/*academic-information, data modal*/

	var remove_space = $(".space-course").remove();
	var remove_label_emphasis = $(".label-emphasis").remove();
	var remove_modal_emphasis = $(".modal-div-emphasis").remove();

	$("#edit-academic-information").on("change", "#course",function(){

		var value_select = $("#course").val();

		if (value_select >= 10)
		{
			$(".remove").append(remove_space);
			$(".remove").append(remove_label_emphasis);
			$(".remove").append(remove_modal_emphasis);

		}else{
			$(".space-course").remove();
			$(".label-emphasis").remove();
			$(".modal-div-emphasis").remove();
		}

	});
	

	if (stateUser == "Alumna") 
	{
		$(".div-dateDeparture").remove();
		$(".label-dateDeparture").remove();
		$(".modal-div-dateDeparture").remove();
		$(".space-dateDeparture").remove();

		$(".space-birthdate").remove();
		$(".space-gender").remove();
		$(".label-gender").remove();
		$(".radio-inline").remove();

	}else{

		$(".div-dateDeparture").append();
		$(".space-div-dateDeparture").append();
		$(".label-dateDeparture").append();
		$(".modal-div-dateDeparture").append();
		$(".space-dateDeparture").append();

	}

	/*academic-information panel*/

	var result_dateEntry = $(".result-dateEntry").html();
	var result_dateDeperture = $(".result-dateDeparture").html();

	if (result_dateEntry == "")
	{
		$(".result-dateEntry").html("Agregue año de ingreso a la institución");
	}

	if (result_dateDeperture == "")
	{
		$(".result-dateDeparture").html("Agregue año de salida de la institución");
	}


	if (stateUser == "Alumna") 
	{
		$(".course").html("Grado actual");
		$(".space-div-dateEntry").remove();
		$(".dateDeparture").remove();
		$(".result-dateDeparture").remove();

	}else{
		$(".course").html("Último año cursado");
		$(".space-div-dateEntry").append();
		$(".dateDeparture").append();
		$(".result-dateDeparture").append();
	}

	/*emphasis panel*/

	var remove1 = $(".space-div-emphasis").remove();
	var remove3 = $(".emphasis").remove();
	var remove2 = $(".result-emphasis").remove();

	var resultcourse = $(".result-course").html();


	if (resultcourse == 10 || resultcourse == 11) 
	{
		
		$(".body-box-academic-information").append(remove1);
		$(".body-box-academic-information").append(remove3);
		$(".body-box-academic-information").append(remove2);

	}else{
	
		var remove1 = $(".space-div-emphasis").remove();
		var remove3 = $(".emphasis").remove();
		var remove2 = $(".result-emphasis").remove();

	}

	/*Location panel*/

	var result_departament = $(".result-departament").html();
	var result_city = $(".result-city").html();
	var result_phone = $(".result-phone").html();
	var result_address = $(".result-address").html();

	if (result_city == null)
	{
		$(".result-city").html("Agregar municipio");
	}

	if (result_phone == null) 
	{
		$(".result-phone").html("Agregar número de celular");
	}

	if (result_departament == null)
	{
		$(".result-departament").html("Agregar departamento");
	}

	if (result_address == null)
	{
		$(".result-address").html("Agregar dirección actual");
	}


	/*record panel*/

	var result_name_job = $(".result-name-job").html();
	var result_position_job = $(".result-position-job").html();
	var result_date_job = $(".result-date-entry").html();

	if (result_name_job == "")
	{
		$(".result-name-job").html("Agregar nombre de la empresa");
	}

	if (result_date_job == "")
	{
		$(".result-date-entry").html("Agregar fecha de ingreso");
	}

	if (result_position_job == "")
	{
		$(".result-position-job").html("Agregar cargo desempeñado");
	}


	


	/*Departamento - ciudad*/

	$(".select-departament").on("change" , function(){

		var id_departament = $(this).val();

		if (id_departament == "") 
		{

			$(".select-city").empty();
			$(".select-city").append("<option value=''>Selecccionar municipio</option>");
		
		}else{

			$.ajax({

				url: '/departament/'+id_departament,
				type: 'get',
				success : function (response) {
					
					$(".select-city").empty();
					for (var i = 0; i < response.length; i++) {
						$(".select-city").append("<option value='"+response[i].id+"' >"+response[i].name_city
							+"</option>");
					}
				}
			}); 

		}


	});


	/*Modal data*/

	var hide1 = $(".space-birthdate").remove();
	var hide2 = $(".space-gender").remove();
	var hide3 = $(".label-gender").remove();
	var hide4 = $(".radio-inline").remove();

	if (typeUser == "Estudiante" &&(stateUser == "Alumna" || stateUser =="Ex alumna"))
	{
		var hide1 = $(".space-birthdate").remove();
		var hide3 = $(".label-gender").remove();
		var hide4 = $(".radio-inline").remove();
	}

	if (typeUser == "Docente" || typeUser == "Administrativo")
	{
		$(".remove_data").append(hide1);
		$(".remove_data").append(hide3);
		$(".remove_data").append(hide4);
	}
	

	/*Actualizar informacion academica*/

	$("#edit-academic-information").on("click" , ".update_academic_information", function(){

		var iduser = this.id;
		var dateEntry = $("#dateEntry").val();
		var course = $("#course").val();

		var message = "El campo vacío no es permitido";

		if (course >= 10)
		{
			emphasis = $("#emphasis").val();

			if (emphasis == "")
			{
				$(".div-message-emphasis").html(message);
			}else{
				$(".div-message-emphasis").hide();
			}

		}else{
			emphasis = "";
		}

		

		if (dateEntry == "")
		{
			$(".div-message-dateEntry").html(message);
		}else{
			$(".div-message-dateEntry").hide();
		}

		if (typeUser == "Estudiante" && stateUser == "Alumna")
		{
			var dateDeparture = "";

		}else if (typeUser == "Estudiante" && stateUser == "Ex alumna")
		{
			var dateDeparture = $("#dateDeparture").val();

			if (dateDeparture == "")
			{
				$(".div-message-dateDeperture").html(message);
			}else{
				$(".div-message-dateDeperture").hide();
			}

		} 

		if (course == "") 
		{
			$(".div-message-course").html(message);
		}else{
			$(".div-message-course").hide();
		}

		var datasend = {

			"userState":stateUser,
			"typeUser": typeUser,
			"dateEntry": dateEntry,
			"dateDeparture": dateDeparture,
			"course": course,
			"emphasis": emphasis,
			"_token": $("#token_update_academic_information").val()
		};

		/*datos anteriores*/
		var oldDateEntry = $("#hidden_entry").val();
		var oldDateDeperture = $("#hidden_deperture").val();
		var oldCourse = $("#hidden_course").val();
		var oldEmphasis = $("#hidden_emphasis").val();


		if (typeUser == "Estudiante" && stateUser == "Alumna" && course>=10)
		{
			if (dateEntry != "" && dateDeparture == "" && course != "" && emphasis != "") 
			{
			
				if (dateEntry != oldDateEntry || course != oldCourse || emphasis != oldEmphasis) 
				{
					AjaxFormAcademicInformation(datasend, iduser);
				}else{
					$('#edit-academic-information').modal('hide');
				}


			}

		}else if(typeUser == "Estudiante" && stateUser == "Alumna" && course<10){

			if (dateEntry != "" && dateDeparture == "" && course != "" && emphasis == "") 
			{
			
				if (dateEntry != oldDateEntry || course != oldCourse) 
				{
					AjaxFormAcademicInformation(datasend, iduser);
				}else{
					$('#edit-academic-information').modal('hide');
				}


			}

		}


		if(typeUser == "Estudiante" && stateUser == "Ex alumna" && course >= 10)
		{
			if (dateEntry != "" && dateDeparture != "" && course!= "" && emphasis != "")
			{
				if (dateEntry != oldDateEntry || dateDeparture != oldDateDeperture || course != oldCourse || emphasis != oldEmphasis )
				{
					AjaxFormAcademicInformation(datasend, iduser);
				}
			}

		}else if(typeUser == "Estudiante" && stateUser == "Ex alumna" && course < 10)
		{
			if (dateEntry != "" && dateDeparture != "" && course!= "" && emphasis == "")
			{
				if (dateEntry != oldDateEntry || dateDeparture != oldDateDeperture || course != oldCourse)
				{
					AjaxFormAcademicInformation(datasend, iduser);
				}
			}
		}



	});

	/*Actualizar datos personales*/

	$("#edit-data").on("click" , ".update_data" , function(){

		var iduser = this.id;
		var birthdate = $("#birthdate").val();


		var oldBirthdate = $("#hidden_birthdate").val();
		var oldGender = $("#hidden_gender").val();

		if ((typeUser == "Estudiante" && stateUser == "Alumna") || (typeUser=="Estudiante" && stateUser =="Ex alumna"))
		{
			var gender = "femenino";
		}

		if (typeUser == "Docente" || typeUser == "Administrativo")
		{
			var gender = $("input[name=sex]").val();
		}

		var message = "El campo vacío no es permitido";

		if (birthdate == "")
		{
			$(".div-message-birthday").html(message);
		}else{
			$(".div-message-birthday").hide();
		}

		if (gender == "")
		{
			$(".div-message-gender").html(message);
		}else{
			$(".div-message-gender").hide();
		}

		var datasend = {
			"userState":stateUser,
			"typeUser": typeUser,
			"birthdate": birthdate,
			"sex": gender,
			"_token": $("#token_update_data").val()
		};

		if (birthdate != "" && gender != "")
		{

			if (birthdate != oldBirthdate || gender != oldGender)
			{
				$.ajax({
					type: 'POST',
					data: datasend,
					url: '/actualizar_datos_personales',
					success: function(response){

						var newClassSnackbar = document.getElementById("snackbar_update_message");
		    			newClassSnackbar.className = "show";
		    			setTimeout(function(){ newClassSnackbar.className = newClassSnackbar.className.replace("show", ""); }, 10000);

		    			$('#edit-data').modal('hide');

		    			var ruta1 = "/viewInformation/"+iduser;
						$(".options-profile").load(ruta1);
						console.info(response)
					}
				});
			}else{
				$('#edit-data').modal('hide');
			}

		}

	});

	$("#edit-location").on("click", ".update_location" , function(){

		iduser = this.id;
		
		var departament = $("select[name=departament]").val();
		var city = $("#modal-city").val();
		var address = $("#modal-address").val();
		var cellphone = $("#modal-cellphone").val();
		

		var datasend = {
			"departament":departament,
			"city": city,
			"address":address,
			"cellphone": cellphone,
			"_token":$("#token_update_location").val()
		};

		var phoneReg = (/^(3([012]\d{2})\s?\d{3}\s?\d{3})+$/);
		var message = "El campo vacío no es permitido";

		var oldDepartament = $("#hidden_departament").val();
		var oldCity = $("#hidden_city").val();
		var oldAddress = $("#hidden_address").val();
		var oldCellphone = $("#hidden_cellphone").val();

		if (departament == "")
		{
			$(".div-message-departament").html(message);
		}else{

			$(".div-message-departament").hide();
		}

		if (city == "")
		{
			$(".div-message-city").html(message);
		}else{
			$(".div-message-city").hide();
		}

		if (address == ""){
			$(".div-message-address").html(message);
		}else{
			$(".div-message-address").hide();
		}

		if (cellphone == "")
		{
			$(".div-message-cellphone").html(message)
		}else  if(!phoneReg.test(cellphone)){
        	$('.div-message-cellphone').html("El número no es permitido");
        }else{
        	$('.div-message-cellphone').hide();
        }

        if (departament != "" && city != "" && address != "" && phoneReg.test(cellphone))
        {
        	if(departament != oldDepartament || city != oldCity || address != oldAddress || cellphone != oldCellphone)
        	{
				$.ajax({

					type: 'POST',
					data: datasend,
					url: '/actualizar_localidad',
					success: function(response){

						console.info(datasend)

						var newClassSnackbar = document.getElementById("snackbar_update_message");
		    			newClassSnackbar.className = "show";
		    			setTimeout(function(){ newClassSnackbar.className = newClassSnackbar.className.replace("show", ""); }, 10000);

		    			$('#edit-location').modal('hide');

		    			var ruta1 = "/viewInformation/"+iduser;
						$(".options-profile").load(ruta1);
					}

				});

			}else{
				$("#edit-location").modal('hide');
			}

		}

	});


	$("#edit-record").on("click" , ".update_record", function(){

		var iduser = this.id;

		var company_name = $("#company-name").val();
		var position = $("#position").val();
		var date_entry = $("#date").val();

		var datasend = {

			"company_name": company_name,
			"position": position,
			"date_entry": date_entry,
			"_token": $("#token_update_record").val()
		};

		var textReg = /^([A-Za-z]\s?)+$/;
		var message = "El campo vacío no es permitido";
		var oldCompany = $("#hidden_company").val();
		var oldPosition = $("#hidden_position").val();
		var oldDateEntry = $("#hidden_dateEntry").val();

		if (company_name == "")
		{
			$('.div-message-name-job').html(message);
		}else{
			$('.div-message-name-job').hide();
		}

		if (position == "") {
        	$('.div-message-position').html(message);
        }else if(!textReg.test(position)){
        	$('.div-message-position').html("El campo debe contener sólo letras");
        }else{
        	$('.div-message-position').hide();
        }

        if (date_entry == "") 
        {
        	$('.div-message-date-job').html(message);
        }else{
        	$('.div-message-date-job').hide();
        }

        if (company_name != "" && textReg.test(position) && date_entry != "")
        {

        	if(company_name != oldCompany || position != oldPosition || date_entry != oldDateEntry)
        	{
				$.ajax({

					type: 'POST',
					data: datasend,
					url: '/actualizar_trabajo',
					success: function(response){

						var newClassSnackbar = document.getElementById("snackbar_update_message");
		    			newClassSnackbar.className = "show";
		    			setTimeout(function(){ newClassSnackbar.className = newClassSnackbar.className.replace("show", ""); }, 10000);

		    			$('#edit-record').modal('hide');

		    			var ruta1 = "/viewInformation/"+iduser;
						$(".options-profile").load(ruta1);

					}

				});
			}else{
				$("#edit-record").modal('hide');
			}

	    }

	});

});

function AjaxFormAcademicInformation(datasend, iduser)
{
	$.ajax({
		type: 'POST',
		data: datasend,
		url: '/actualizar_informacion_academica',
		success: function(response){

			var newClassSnackbar = document.getElementById("snackbar_update_message");
			newClassSnackbar.className = "show";
			setTimeout(function(){ newClassSnackbar.className = newClassSnackbar.className.replace("show", ""); }, 10000);

			$('#edit-academic-information').modal('hide');

			var ruta1 = "/viewInformation/"+iduser;
			$(".options-profile").load(ruta1);
		}
	});

}