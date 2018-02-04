@php

$followers = DB::table('follows')
->select('users.*')
->join('users' , 'users.iduser'  , '=' , 'follows.iduserfollowed')
->where('follows.iduserfollower', '=', Auth::user()->iduser)
->get();

@endphp

	<div class="div-box-follower">
	
		<ul class="list-group" >

		@foreach($followers as $follower)

	  		<li class="list-group-item col-lg-12 col-md-12 col-sm-12 col-xs-12 list-group-follower" style="">

		  		<div class="col-lg-10 col-md-10 col-xs-10 col-sm-10 div-information">

			  		<a href="/perfil/{{$follower->iduser}}" class="photo-follower hidden-xs">
			  			<img src="{{asset('/image/photo-user/'.$follower->photo)}}" class="photo-user-follower">
			  		</a>

			  		<a href="/perfil/{{$follower->iduser}}" class="name-follower"> 
			  			<label class="label-name-follower">{{$follower->nameUser}}</label>
			  		</a>
			  	</div>

			  	<div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 div-follow">
			  		<button class="mdl-button  btn-follow">
	     				seguir
	    			</button>
	    		</div>

	  		</li> 	

	  	@endforeach

		</ul>

	</div>
