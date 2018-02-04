<!DOCTYPE html>
<html>
<head>

	<title> @yield('title') </title>

	<meta name = "viewport" content = " width=device-width, user-scalable= no, initial-scale = 1.0, maximun-scale = 1.0, minimum-scale = 1.0">


	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/navs.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/material/material.min.css')}}">

	@yield('css')

</head>

<body style="background: @yield('bg');" class="body">

	<div class="bd-l">

	<input type="hidden"  name="_token" id="token" value="{{csrf_token()}}"/>

	<nav class="navbar navbar-default navbar-fixed-top nav" role="navigation">

	  	<div class="navbar-header">

		    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
		      <span class="sr-only">Desplegar navegación</span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		      <span class="icon-bar"></span>
		    </button>

		    <a class="navbar-brand link-logo" href="/"><img src="{{asset('/image/Logo/logo.png')}}" class="img-default"></a>

	  	</div>

		<div class="collapse navbar-collapse navbar-ex1-collapse">
		    
		    <form class="navbar-form navbar-left nav-form" role="search">

		      	<div class="input-group browser">

			      	<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>

			     	<input id="email" type="text" class="form-control" placeholder="Buscar">

			    </div>

		    </form>
		 
		    <ul class="nav navbar-nav navbar-right">

		      	<li class="nav-li">

			      	<a href="/perfil/{{Auth::id()}}" id="nav-a"> 
					      			
						<div class="nav-profile-div">

				  			<img src="{{asset('/image/photo-user/'.Auth::user()->photo)}}" class="nav-image-profile"/>

				  			<span class="name-user-nav hidden-sm">{{Auth::user()->nameUser}} {{Auth::user()->lastname}}</span>

						</div>

				   </a>

			   </li>

		      <li class="dropdown nav-li-right">

		        <a href="#" class="dropdown-toggle" data-toggle="dropdown">

		          <b class="caret"></b>

		        </a>

		        <ul class="dropdown-menu">
		          <li><a href="#">Configurar cuenta</a></li>
		          <li><a href="#">Configurar datos</a></li>
		          <li class="divider"></li>
		          <li><a href="/salir">Cerrar sesión</a></li>
		        </ul>
		      </li>

		    </ul>

		</div>

	</nav>



	@yield('content')
	
	</div>
	

</body>

<script type="text/javascript" src="{{asset('js/jquery.js')}}"></script>

<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/material/material.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/friendship.js')}}"></script>

<script type="text/javascript" src="{{asset('js/profile.js')}}"></script>

<script type="text/javascript" src="{{asset('js/presentation.js')}}"></script>


@yield('js')

</html>

	
	