@if($count_followers > 0)

@php
$iduserfollower = Auth::id();
$iduserfollowed= $followers[0]->iduser;

$userAuth;
$textFollow;


$userFollowed = App\Follow::where('iduserfollower' , '=' ,$iduserfollower)->where('iduserfollowed' , '=' , 
	$iduserfollowed)->count();

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

@endphp



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 div-notFollow">

	<a href="/perfil/{{$followers[0]->iduser}}" class="photo-notFollow">
		<img src="{{asset('/image/photo-user/'.$followers[0]->photo)}}" class="img-user-notFollow">
	</a>

	<a href="/perfil/{{$followers[0]->iduser}}" class="name-notFollow">
		{{$followers[0]->nameUser}} {{$followers[0]->lastname}}
	</a>

	<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect btn-follow" id="{{$followers[0]->id}}" value="{{$iduserfollowed}}">{{$textFollow}}</button>



</div>


@endif