<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="{{asset('js/information.js')}}"></script>
</head>
<body>

	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 body-information">

		<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs">
			
		</div>

		<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-12 box-body">

			<input type="hidden" name="userState" id="userState" value="{{$user->state}}">

			<input type="hidden" name="typeUser" id="typeUser" value="{{$user->typeUser}}">

			<input type="hidden" value="{{Auth::id()}}" id="authid">
			<input type="hidden" value="{{$user->iduser}}" id="userid">

			<div class="mdl-card mdl-shadow--2dp" id="snackbar_update_message">Los datos han sido actualizados satisfactoriamente.</div>

			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 box-width">
			
				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 box-academic-information">

					<div class="academic-information  mdl-shadow--2dp">

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 div-title-box-academic-information">

							<div class="col-xl-8 col-lg-8 col-md-8 col-sm-8  col-xs-8 title-box-academic-information">
								Años cursados en la institución
							</div>

							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-xs-4 edit-title-box-academic-information">
								<a class="link-edit-academic-information pull-right" data-target="#edit-academic-information" data-toggle="modal" >
									<span class="glyphicon glyphicon-pencil"></span>
								</a>
							</div>

						</div>

						<div class="body-box-academic-information">

							<div class="dateEntry">Fecha de ingreso</div>
							<div class="result-dateEntry">{{$user->yearEntry}}</div>

							<br class="space-div-dateEntry">

							<div class="dateDeparture">Fecha de salida</div>
							<div class="result-dateDeparture">{{$user->yearDeperture}}</div>

							<br class="space-div-dateDeparture">

							<div class="course">Grado actual</div>
							<div class="result-course">{{$user->course}}</div>

							<br class="space-div-emphasis">

							<div class="emphasis">Énfasis</div>
							<div class="result-emphasis">{{$user->emphasis}}</div>

						</div>

					</div>
					
				</div>

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 box-location">

					<div class="location  mdl-shadow--2dp">

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 div-title-box-location">

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 title-box-location">
								Ubicación actual
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 edit-title-box-location">
								<a class="link-edit-location pull-right" data-target="#edit-location" data-toggle="modal" ><span class="glyphicon glyphicon-pencil"></span></a>
							</div>

						</div>

						<div class="body-box-location">

						@foreach($users as $userData)

							<div class="departament">Departamento</div>
							<div class="result-departament" id="{{$user->departament}}">{{$userData->name_state}}</div>

							<br>

							<div class="city">Ciudad</div>
							<div class="result-city">{{$userData->name_city}}</div>
					
						@endforeach

							<br>
							<div class="address">Dirección</div>
							<div class="result-address">{{$user->address}}</div>

							<br>

							<div class="cellphone">Número celular</div>
							<div class="result-phone">{{$user->phone}}</div>

						</div>
						
					</div>

				</div>




			</div>


			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 box-width" >

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 box-data">

					<div class="data  mdl-shadow--2dp">

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 div-title-box-data">

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 title-box-data">
								Fecha de nacimiento y sexo
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 edit-title-box-data">
								<a class="link-edit-data pull-right" data-target="#edit-data" data-toggle="modal" ><span class="glyphicon glyphicon-pencil"></span></a>
							</div>

						</div>

						<div class="body-box-data">

							<div class="birthdate">Fecha de nacimiento</div>
							<div class="result-birthdate">{{$user->birthdate}}</div>

							<br class="space-div-birthdate">

							<div class="sex">Sexo</div>
							<div class="result-gender">{{$user->sex}}</div>

						</div>
						
					</div>

				</div>

				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 box-record">

					<div class="record  mdl-shadow--2dp">

						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 div-title-box-record">
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 title-box-record">
								Trabajo actual
							</div>

							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6 edit-title-box-record">
								<a class="link-edit-record pull-right" data-target="#edit-record" data-toggle="modal" ><span class="glyphicon glyphicon-pencil"></span></a>
							</div>

						</div>

						<div class="body-box-record">

							<div class="not-working"></div>

							<div class="working">

								<div class="name_job">Nombre de la empresa</div>
								<div class="result-name-job">{{$user->name_job}}</div>

								<br>

								<div class="position_job">Cargo desempeñado</div>
								<div class="result-position-job">{{$user->position_job}}</div>
								<br>

								<div class="date_entry">Fecha de ingreso</div>
								<div class="result-date-entry">{{$user->date_job}}</div>

							</div>

						</div>

					</div>
					
				</div>

			</div>
			
		</div>

		<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs">
			
		</div>

	</div>

	<!--modal edit record -->
	@include('modal_edit_record')


	<!--Modal academic information-->
	@include('modal_academic_information')

	<!--Modal data-->
	@include('modal_data')
	

	<!--Modal location-->
	@include('modal_location')
	
</body>
</html>