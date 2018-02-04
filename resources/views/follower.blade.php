@php

$followers = DB::table('follows')
->select('users.*')
->join('users' , 'users.iduser'  , '=' , 'follows.iduserfollower')
->where('follows.iduserfollowed', '=', Auth::user()->iduser)
->get();

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

@endphp

	<div class="div-box-follower">



		@foreach($followers as $follower)


	  		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-11 col-lg-offset-1 col-sm-offset-1 col-md-offset-1 col-xs-offset-1" style="margin-bottom: 30px; padding-top: 13px; padding-bottom: 13px; box-shadow: 0 4px 2px -3px gray; box-shadow: 1px 1px 5px gray; border-radius: 2px; margin-right: 4%; margin-left: 4.2%; padding-right: 20px; height: 100%;">

		  		<a href="/perfil/{{$follower->iduser}}" class="photo-follower hidden-xs">
		  			<img src="{{asset('/image/photo-user/'.$follower->photo)}}" class="photo-user-follower" style="vertical-align: middle;">
		  		</a>

		  		<a href="/perfil/{{$follower->iduser}}" class="name-follower"> 
		  			<label class="label-name-follower">{{$follower->nameUser}}</label>
		  		</a>

		  		<button class="btn btn-default btn-follow" style="background: #009688; color: white; float: right; margin-top: 32.5px;" value="{{$iduserfollowed}}" id="{{$userFollowed}}">{{$textFollow}}</button>

		</div>
		  	
		  	
	  		
	  	@endforeach

	</div>

<script type="text/javascript" src="{{asset('js/friendship.js')}}"></script>