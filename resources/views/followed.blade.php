@php

$follows = DB::table('follows')
	->select('users.*')
	->join('users' , 'users.iduser'  , '=' , 'follows.iduserfollowed')
	->where('follows.iduserfollower', '=', $user->iduser)
	->orderby('nameUser' , 'ASC')
	->get();


$followeds = $follows->toArray();
$count_followeds = count($followeds);

@endphp

	<div class="div-box-follow">

		@if($count_followeds  == 0)
		
			<div align="center">
				<h6 style="font-weight: bold">Aún no sigues a ninguna persona.</h6>
			</div>
		@else

			@for($i = 0; $i < $count_followeds ; $i++)

				@php

					$userAuth;
					$iduserfollower = Auth::id();
					$iduserfollowed= $followeds[$i]->iduser;
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

			  		<a href="/perfil/{{$followeds[$i]->iduser}}" class="photo-follower hidden-xs">
			  			<img src="{{asset('/image/photo-user/'.$followeds[$i]->photo)}}" class="photo-user-follower" style="vertical-align: middle;">
			  		</a>

			  		<a href="/perfil/{{$followeds[$i]->iduser}}" class="name-follower"> 
			  			<label class="label-name-follower">{{$followeds[$i]->nameUser}}</label>
			  		</a>

			  		<button class="btn btn-default btn-follower" style="background: #009688; color: white; float: right; margin-top: 32.5px;" value="{{$iduserfollowed}}" id="{{$iduserfollowed}}">{{$textFollow}}</button>

				</div>
			  	
		  	@endfor

	  	@endif

	  	<script type="text/javascript" src="{{asset('js/friendshipViewFollow.js')}}"></script>

	</div>
