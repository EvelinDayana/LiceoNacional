@extends('layouts.master')

<link rel="stylesheet" type="text/css" href="{{ asset('/css/sign-up.css')}}">

@section('title')

	Registrar Usuario

@endsection

@section('content')

@section('bg')

#F5F5F5

@endsection

	<div class="nav">

		<div class="logo"> 

			<h1 class="text-success" id="text-deco">Meet Site</h1>
				
		</div>
		
	</div>

	<div class="sign-up">

		<div class="form-sign-up">

			<form id="formulario">

				<h3>Regístrate</h3>

				<br>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 error"></div>

				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">					
					<input type="text" name="document" class="form-control" id="document" placeholder="N° documento de identificación" required="true" id="document" />

					<div class="div-document"></div>
				</div>

				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">			
					<input type="text" name="name" class="form-control" placeholder="Nombre" required="true" id="name"/>

					<div class="div-name"></div>
				</div>				

				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<input type="text" class="form-control" name="lastname" placeholder="Apellido" required="true" id="lastname" />

					<div class="div-lastname"></div>
				</div>

				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<input type="text" name="email" placeholder="Correo" class="form-control" required="true" id="email">

					<div class="div-email"></div>
				</div>

				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<input type="password" class="form-control" name="passUser" placeholder="Contraseña" required="true" id="password" />

					<div class="div-password"></div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="message-name"></div>

				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 title">

					<label for="date" class="title"> Fecha de nacimiento: </label>
					<input type="date" class="form-control" name="date" id="date" />
					<div class="div-date"></div>
				</div>

				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<input type="text" name="phone" class="form-control" placeholder="Número celular" required="true" id="phone" />
					<div class="div-phone"></div>
				</div>

				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 title">

					<label for="type-user" class="title">Tipo de usuario: </label>

					<select class="form-control" required="true" name="typeUser" id="type-user">
						<option value="">Seleccionar</option>
						<option value="Docente"> Docente </option>
						<option value="Estudiante"> Estudiante</option>
						<option value="Administrativo"> Administrativo </option>				
					</select>

					<div class="div-typeuser"></div>

				</div>


				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 title" id="sign-up1">

					<div class="radio-inline">
  						<label class="title" for="input-sex-fem">
  							<input id="input-sex-fem" type="radio" name="sex" value="femenino"/>Femenino
  						</label>
					</div>

					<div class="radio-inline">
  						<label class="title" for="input-sex-masc">
  							<input id="input-sex-masc" type="radio" name="sex" value="masculino"/>Masculino
  						</label>
					</div>

					<div class="div-sex"></div>

				</div>

				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 title" id="sign-up2">
					<label for="state" class="title"> Estado: </label>
					<select class="form-control" name="state" id="state">
						<option value="">Seleccionar</option>
						<option value="Alumna">Alumna</option>
						<option value="Ex alumna">Ex alumna</option>
					</select>

					<div class="div-state"></div>
				</div>

				

				<div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12 title" id="sign-up4">
					<label for="emphasis" class="title"> Énfasis: </label>
					<select class="form-control" name="emphasis" id="emphasis">
						<option value="">Seleccionar</option>
						<option value="Derechos humanos">Derechos humanos</option>
						<option value="Electronica">Electronica</option>
						<option value="Ciencias">Ciencias</option>
						<option value="Sena">Sena</option>
					</select>	

					<div class="div-emphasis"></div>			
				</div>	

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<input type="submit" class="btn btn-success btn-block col" value="Registarse" name="btn-signUp" id="btn-signUp" />
				</div>


				<div class="sign-in col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<label>¿Ya estás registrado?</label>
					<a href="/" class="text-success">Inicia sesión</a>
				</div>	

				<input type="hidden" name="_token" value="{{Session::token()}}" id="token"/>	

			</form>

		</div>

	</div>



@endsection

@section('js')
	<script type="text/javascript" src="{{asset('js/sign-up.js')}}"></script>
@endsection