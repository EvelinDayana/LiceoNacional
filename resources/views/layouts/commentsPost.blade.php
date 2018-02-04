@php
	$comments = $post->comments;
@endphp

@foreach($comments as $comment)

@php

$usercreatecomment = App\User::find($comment->iduser);
$postcomment = App\Post::find($comment->idpost);

@endphp

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header-post-comment dc-{{$comment->id}}" id="{{$comment->id}}">

	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 header-comment">

		<a href=""> <img src="{{asset('/image/photo-user/'.$user->photo)}}" class="photo-profile-comment"> </a>

	</div>

	<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 header-comment">

		<a href="" class="name-user-comments">{{$usercreatecomment->nameUser}}</a>

		<p class="comment-text">{{$comment->comment}}</p>

	</div>

	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 btn-comment-{{$comment->id}}" id="btn-comment">

		<div class="btn-group pull-right">
 
			<button type="button" class="btn btn-link dropdown-toggle btn-options" data-toggle="dropdown"> 
			  	<img src="{{asset('/image/icons/points-menu.png')}}" class="points-menu-2">
			  	<span class="sr-only">Desplegar menú</span>
			</button>
			 
			<ul class="dropdown-menu" role="menu">				

			    <li>				    
			    	<a  id="{{$comment->id}}" class="delete-c">Eliminar</a>
			    </li>
		 	
			</ul>

		</div>

	</div>
			
</div>



@endforeach 

	
 	
