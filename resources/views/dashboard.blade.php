@extends('layouts.nav')

@section('css') 

	<link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/dashboard-empty.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/notFollow.css')}}">

@endsection

@section('title')
	inicio
@endsection

@section('bg')
	#f5f5f5
@endsection

@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 div-dashboard">

	<input type="hidden" id="count_followers" value="{{$count_followers}}">

	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 subdiv-dashboard"></div>

	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 div-posts">

		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 other-content-dashboard">

			<div class="demo-card-square mdl-card mdl-shadow--2dp content-notFollow">

				<div class="mdl-card__title  div-card-title">
				    <h6 class="mdl-card__title-text" id="card-title">Personas que aún no sigues</h6>
				</div>

				<div class="content-card">

					@include('layouts.notFollow')
 
				</div>

				<div class="content-card-deploy">

					@include('layouts.notFollow-deploy')

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 message-warning"> <img src="{{asset('image/icons/warning-notFollow.png')}}" class="img-message-warning"> No tienes más personas por seguir </div>
 
				</div>

				<div class="content-card-message">

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 message-null">

						<img src="{{asset('image/icons/warning.png')}}" class="img-warning">		
						Aún no tienes personas pendientes por seguir.

					</div>
 
				</div>

				<div class="mdl-card__actions mdl-card--border">

				    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" id="link-notFollow" disabled = "disabled">

				     	Ver todas
				    </a>

				</div>

			</div>


			<div class="demo-card-square mdl-card mdl-shadow--2dp" style="margin-bottom: 30px;">
				<div class="mdl-card__title  div-card-title">
				    <h6 class="mdl-card__title-text" id="card-title">Personas que están cumpliendo años</h6>
				</div>

				<div class="content-birthday">		

					<img src="{{asset('image/icons/cake.png')}}" class="img-birthday">

					@include('layouts.birthdate')
 
				</div>

				<div class="mdl-card__actions mdl-card--border">
				    <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
				     	Ver todas
				    </a>
				</div>

			</div>


		</div>

		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 content-div-post-dashboard pull-right" style="right: 0px;">

			<div class="post">
				@include('layouts.post')
			</div>

			<div class="post-item">
				@include('layouts.post-Item-dashboard')
			</div>

			<div class="post-item-dashboard-empty">
				
				@include('layouts.dashboard-empty')
				
			</div>

		</div>
		
		
	
	</div>

	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 subdiv-dashboard"></div>

</div>


@endsection

@section('js')

	<script type="text/javascript" src="{{asset('js/dashboard.js')}}"></script>
	
	<script type="text/javascript" src="{{asset('js/followDashboard.js')}}"></script>

@endsection