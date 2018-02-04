<input type="hidden" value="{{$follows}}" id="follows">

@for($i = 1; $i < $count_followers; $i++)

@php
$iduserfollower = Auth::id();
$iduserfollowed= $followers[$i]->iduser;

$userAuth;
$textFollow;

$follow = 

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

	<a href="/perfil/{{$followers[$i]->iduser}}" class="photo-notFollow">
		<img src="{{asset('/image/photo-user/'.$followers[$i]->photo)}}" class="img-user-notFollow">
	</a>

	<a href="/perfil/{{$followers[$i]->iduser}}" class="name-notFollow">
		{{$followers[$i]->nameUser}} {{$followers[$i]->lastname}}
	</a>

	<button class="mdl-button mdl-js-button mdl-js-ripple-effect btn-follow" id="{{$followers[$i]->id}}" value="{{$iduserfollowed}}">{{$textFollow}}</button>

	<input type="hidden" value="{{count($followers[$i])}}" id="followers">

</div>

@endfor