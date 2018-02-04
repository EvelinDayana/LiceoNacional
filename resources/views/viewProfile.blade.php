<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{asset('css/post.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/post-item.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/comments-post.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/like.css')}}">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

	<!-- publicaciones y navegacion -->

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs" id="body-two">

		<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>

		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" id="div-two">

			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" id="div-left">

				<a href="" class="href-message">
					<div id="div-message">
						<span class="glyphicon glyphicon-envelope icon-envelope"> </span><span class="message">Mensajes</span>
					</div>
				</a>

				<a href="" class="href-events">
					<div id="div-events">
						<span class="glyphicon glyphicon-list-alt icon-list-alt"> </span><span class="events">Crear eventos</span>
					</div>
				</a>

				<div class="teachers">

					<span class="glyphicon glyphicon-education icon-education"></span>
					<span class="">Profesores</span>
					
				</div>

				<div class="students">

					<span class="glyphicon glyphicon-education icon-student"></span>
					<span class="">Estudiantes</span>
					
				</div>



			</div>

			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 content-div-post pull-right">

				<div class="post">
					@include('layouts.post')
				</div>

				<div class="post-item">
					
					@include('layouts.post-Item')

				</div>
				
			</div>

		</div>

		<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>

	</div>

</body>

	<script type="text/javascript" src="{{asset('js/post.js')}}"></script>

	<script type="text/javascript" src="{{asset('js/post-item.js')}}"></script>
	
	<script type="text/javascript" src="{{asset('js/comments-post.js')}}"></script>

	<script type="text/javascript" src="{{asset('js/like.js')}}"></script>

</html>










	


