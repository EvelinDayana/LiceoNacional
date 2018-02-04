@extends('layouts.nav')

@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('css/presentation.css')}}">

@endsection

@section('title')  
Perfil
@endsection

@section('bg')
#f5f5f5
@endsection


@php

$userAuth;
$iduser = $user->iduser;
$iduserfollower = Auth::id();
$iduserfollowed = $iduser;
$textFollow;

$stateUser;

$userFollowed = App\Follow::where('iduserfollower' , '=' , $iduserfollower)->where('iduserfollowed' , '=' , $iduserfollowed)->count();

if($iduserfollower == $iduserfollowed){
	$userAuth = true;
}else{
	$userAuth = false;
}

if($userFollowed == 0)
{
	$textFollow = "seguir";
}else{
	$textFollow = "siguiendo";
}

if($user->typeUser == "Docente" || $user->typeUser == "Administrativo") 
{
	$stateUser = $user->typeUser;    

}else{

	$stateUser = $user->state;
}
@endphp

@section('content')

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="div-start">

	<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs">
	
	</div>

	<div class="col-lg-10 col-md-10 col-sm-10  col-xs-12 cover-page">

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center" id="div-profile-options" style="margin-top: @if ($userAuth) 60.5px @endif">

			<input type="hidden" name="iduser-update-photo" value="{{$user->iduser}}" id="iduser-update-photo"/>

			<a class="div-photo-user" id="{{Auth::id()}}"> 
				
				<div class="div-photo-profile">

					<img src="{{asset('/image/photo-user/'.$user->photo)}}" class="photo-profile">	
				</div> 
			</a>
	
		</div>


		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 div-name-profile" style="margin-top: @if ($userAuth) 30px @endif">

			<a href="/perfil/{{$user->iduser}}" id="link-nameuser"><span class="name-profile">{{$user->nameUser}} {{$user->lastname}}</span></a>

			<br>

			<span class="type-user">{{$stateUser}}</span>

			<br> 

			<button class="mdl-button mdl-js-button mdl-js-ripple-effect btn-follow"  value="{{$iduserfollowed}}" style="display: @if ($userAuth) none @endif" id="{{$userFollowed}}">{{$textFollow}}</button>	
							
		</div>


		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 center" >

			<div class="col-lg-1 col-md-1 hidden-sm hidden-xs"></div>

			<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 link-presentation"  id="options-bar" style="margin-top: @if ($userAuth) 60.7px @endif ; margin-left: 0; padding-left: 0; margin-right: 0; padding-right: 0;">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin:0; padding: 0;  height: 100%">

				<input type="hidden" value="{{$iduser}}" id="iduser">

				<a href="" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 href-profile active">
					<span class="glyphicon glyphicon-user icon-profile"></span>
					<br>
					<span class="hidden-xs profile">Perfil</span>
				</a>

				<a href="" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 href-information">
					<span class="glyphicon glyphicon-pencil icon-information"></span>
					<br>
					<span class="hidden-xs information">Información</span>
				</a>
				

				<a href="/amigos/{{$user->iduser}}" class=" col-lg-2 col-md-2 col-sm-2 col-xs-2 href-friends">
					<span class="glyphicon glyphicon-plus-sign icon-friends"></span>
					<br>
					<span class="hidden-xs friends">Seguidores</span>
				</a>

				<a href="" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 href-push">
					<span class="glyphicon glyphicon-pushpin icon-push"></span>
					<br>
					<span class="hidden-xs push">Anuncios</span>
				</a>
				
				<a href="" class="col-lg-2 col-md-2 col-sm-2 col-xs-2 href-event">
					<span class="glyphicon glyphicon-calendar icon-event"></span>
					<br>
					<span class="hidden-xs event">Eventos</span>
				</a>
				
				<a class="col-lg-2 col-md-2 col-sm-2 col-xs-2 href-configuration" data-toggle="modal" data-target="#configuration">
					<span class="glyphicon glyphicon-cog icon-configuration"></span>
					<br>
					<span class="hidden-xs configuration">Configuración</span>
				
				</a>				

			</div>
				
			</div>

			<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>

		</div>

	</div>

	<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs">
	
	</div>

</div>

<div class="options-profile">

</div>

@endsection

@section('js')	
	
	
@endsection