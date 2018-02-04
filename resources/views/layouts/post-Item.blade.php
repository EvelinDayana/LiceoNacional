@php
	$posts = $user->posts;
@endphp

@foreach($posts as $post)

@php
	
	$usercreate = App\User::find($post->idusertransmitter);

	$totallike = App\Like::where('idpostlike', '=' ,  $post->idpost)->where('iduserlike', '=' , Auth::id())->count();

	$validar;
	$totallike += 0;

	if($totallike == 0)
	{
		$validar = false;
	}else{
		$validar = true;
	}

	$idcheckbox = "checkbox".$post->idpost;

@endphp

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divs-posts" id="dp-{{$post->idpost}}">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header-post">

		<a href="/perfil/{{$usercreate->iduser}}" class="link-photo-profile-post"> <img src="{{asset('/image/photo-user/'.$usercreate->photo)}}" class="photo-profile-post"> </a>

		<a href="/perfil/{{$usercreate->iduser}}" class="name-post">{{$usercreate->nameUser}}</a>

		<div class="btn-group pull-right">

			<button type="button" class="btn btn-link dropdown-toggle btn-options" data-toggle="dropdown"> <img src="{{asset('/image/icons/points-menu.png')}}" class="points-menu">
			   
				<span class="sr-only">Desplegar menú</span>

			 </button>
			 
			<ul class="dropdown-menu" role="menu">

				<li>
					<a id="{{$post->idpost}}" class="delete-p">Eliminar publicación</a>
				</li>	

			</ul>

		</div>
		
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-post">

		<p>{{$post->description}}</p>
		
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-post">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 options-post">

			<a  class="link-comment" id="{{$post->idpost}}"><span class="glyphicon glyphicon-comment"></span><span class="comment hidden-xs">Comentar</span></a>

	
			<input type="checkbox" name="likes" id="{{$idcheckbox}}" class="link-like" value="{{$post->idpost}}" @if ($validar)checked @endif />

			<label for="{{$idcheckbox}}">Me gusta</label>				

		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  time-post ">
			Hace un momento
		</div>

	</div>

	<hr style="border: 0.2px solid #e0e0e0;">

	<div id="all_comments-{{$post->idpost}}" class="all_comments">

		@include('layouts.commentsPost')

	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comment-post">

		<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs  img-comment">

			<img src="{{asset('/image/photo-user/'.Auth::user()->photo)}}" class="photo-profile-comment"/>

		</div>

		<div class="col-lg-11 col-md-11 col-sm-11 col-xs-12 txt-comment">

			<form class="formulario" id="{{$post->idpost}}">

				<input type="hidden" name="postid" value="{{$post->idpost}}" id="postid-{{$post->idpost}}" />

				<textarea class="form-control comment-txt-{{$post->idpost}} textarea3" placeholder="¿Tienes algo que comentar?" name="comment" id="{{$post->idpost}}"></textarea>

				<button type="submit" class="btn btn-link btn-submit pull-right" id="btn-submit-link-{{$post->idpost}}" disabled></button> 

				<input type="hidden" value="{{Session::token()}}"  name="_token" id="token"/>
			
			</form>

		</div>

	</div>

</div>

@endforeach
	
