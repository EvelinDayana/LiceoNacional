@php

$follows = DB::table('follows')
	->select('users.*')
	->join('users' , 'users.iduser'  , '=' , 'follows.iduserfollower')
	->where('follows.iduserfollowed', '=', $user->iduser)
	->orderby('nameUser' , 'ASC')
	->get();

$followers = $follows->toArray();
$count_followers = count($followers);

@endphp


	<div class="div-box-follow">

		@if($count_followers  == 0)
		
			<div align="center">
				<h6 style="font-weight: bold">Aún ninguna persona te sigue.</h6>
			</div>
		@else

		@for($i = 0; $i < $count_followers ; $i++)

			@php

				$userAuth;
				$iduserfollower = Auth::id();
				$iduserfollowed= $followers[$i]->iduser;
				$textFollow;

				$stateUser;

				$userFollowed = App\Follow::
					where('iduserfollower' , '=' , $iduserfollower)->where('iduserfollowed' , '=' , $iduserfollowed)->count();

				if($iduserfollower == $iduserfollowed){
					$userAuth = true;
				}else{
					$userAuth = false;
				}

				if($userFollowed == 0)
				{
					$textFollow = "Seguir";
				}else{
					$textFollow = "Dejar de seguir";
				}

			@endphp


	  		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-11 col-lg-offset-1 col-sm-offset-1 col-md-offset-1 col-xs-offset-1" style="margin-bottom: 30px; padding-top: 13px; padding-bottom: 13px; box-shadow: 0 4px 2px -3px gray; box-shadow: 1px 1px 5px gray; border-radius: 2px; margin-right: 4%; margin-left: 4.2%; padding-right: 20px; height: 100%;">

		  		<a href="/perfil/{{$followers[$i]->iduser}}" class="photo-follower hidden-xs">
		  			<img src="{{asset('/image/photo-user/'.$followers[$i]->photo)}}" class="photo-user-follower" style="vertical-align: middle;">
		  		</a>

		  		<a href="/perfil/{{$followers[$i]->iduser}}" class="name-follower"> 
		  			<label class="label-name-follower">{{$followers[$i]->nameUser}}</label>
		  		</a>

		  		<button class="btn btn-default btn-follower" style="background: #009688; color: white; float: right; margin-top: 32.5px;" value="{{$iduserfollowed}}" id="{{$iduserfollowed}}">{{$textFollow}}</button>

			</div>
		  	
	  	@endfor

	  	<script type="text/javascript" src="{{asset('js/friendshipViewFollow.js')}}"></script>

	  	@endif
	  	
	</div>

