@extends('layouts.master')

<link rel="stylesheet" type="text/css" href="{{asset('css/sign-in.css')}}">

@section('title')

Iniciar sesión

@endsection

@section('content')

	<div class="body">
 
		<img class="image-body" src="{{asset('/image/signIn/background/background-body.jpg')}}"/>	

		<div class="nav">
			<div class="col-lg-10 col-md-10 col-sm-9 col-xs-8 pull-left logo"> 

				<a href=""><img src="{{asset('/image/Logo/logo.png')}}" width="80px" height="80px"></a>
				
			</div>

			<div class="col-lg-2 col-md-2 col-sm-3 col-xs-4 pull-right sign-up">
				<a href="/registrarse" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" id="btn-nav-sign-up" >Regístrate</a>
			</div>

		</div>

		<div class="body-login">

			<br>	

			<div class="col-lg-7 col-md-7 col-sm-7 hidden-xs div-title-login">

				<div class="title">

						<label  id="text-deco">Meet Site</label>
						
						<label  id="text-deco">Liceo Nacional</label>
				

				</div>

			</div>

			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 div-form-sign-in">

				<div class="div-login">

					<div class="login">

						<div class="user">

							<div class="user-default">
								<img src="{{asset('/image/photo-user/usuario.png')}}" width="120px" height="120px" class="img-user">
							</div>

						</div>

						<form id="form-signin">

							<div class="input-group user-login-div">
								<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
								<input class="form-control" type="email" name="email" id="user-login" placeholder="Correo" required="true">
							</div>

							<div class="input-group input-password">
								<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
								<input class="form-control" type="password" name="password" id="password-login" placeholder="Contraseña" required="true">
							</div>

							<button  type="submit" id="btn-signin" class="btn btn-success btn-block btn-submit">Ingresar</button>

							<div id="hl"></div>

							<input type="hidden" name="_token" value="{{Session::token()}}" id="token"/>	

						</form>

						<div class="forget-div">

							<label class="text-forget-div">¿Has olvidado tu contraseña?</label> 
							<a href="" class="text-success">Ingresa aquí</a>

						</div>

					</div>	

				</div>

			</div>
			
		</div>		

	</div>
	

@endsection

@section('js')
	<script type="text/javascript" src="{{asset('js/sign-in.js')}}"></script>
@endsection
