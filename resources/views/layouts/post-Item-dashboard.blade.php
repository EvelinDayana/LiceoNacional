@php
	$universal = 0;
@endphp

@foreach($posts as $post)

@php

	$usercreate = App\User::find($post->idusertransmitter);
	$userreceiver = App\User::find($post->iduserreceiver);

	$totallike = App\Like::where('idpostlike', '=' ,  $post->idpost)->where('iduserlike', '=' , $userId)->count();

	$validar;
	$totallike += 0;
	$idcheckbox = "checkbox".$post->idpost;

	if($totallike == 0)
	{
		$validar = false;

	}else{

		$validar = true;
	}

	$validaruserpost;

	if($post->idusertransmitter == $post->iduserreceiver)
	{
		$validaruserpost = true;
	}else{
		$validaruserpost = false;
	}

	$time_post = "";
	$nowTime = strtotime("now");
	$timestamp = strtotime($post->created_at);
		

	$secondPost= $nowTime - $timestamp;


	if($secondPost < 60)
	{
		$time_post = "Hace unos segundos";
	}

	if( $secondPost == 60){
		$time_post = "Hace un minuto";
	}

	if( $secondPost > 60 && $secondPost < (60*60)){
		$time_post = "Hace unos minutos";
	}

	if( $secondPost == (60*60)){
		$time_post = "Hace una hora";
	}

	if( $secondPost > (60*60)  && $secondPost < (24*3600)){
		$time_post = "Hace unas horas";
	}

	if( $secondPost == (24*3600))
	{
		$time_post = "Hace un día";
	}

	if( $secondPost == (48*3600))
	{
		$time_post = "Hace dos días";
	}

	if( $secondPost > (48*3600))
	{
		$time_post = "Hace unos días";
	}

	$validateUser;

	if($post->idusertransmitter == $userId || $post->iduserreceiver == $userId)
	{
		$validateUser = true;
	}else{
		$validateUser = false;
	}

	$validatePhotoPost;

	if($post->photopost != null)
	{
		$validatePhotoPost = true;
	}else{
		$validatePhotoPost = false;
	}

	$universal = $universal + 1;

@endphp


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 divs-posts" id="dp-{{$post->idpost}}">

	<input type="hidden" value="{{$count_posts}}" id="count_posts">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 header-post">

		<a href="/perfil/{{$usercreate->iduser}}" class="link-photo-profile-post"> <img src="{{asset('/image/photo-user/'.$usercreate->photo)}}" class="photo-profile-post"> </a>

		<a href="/perfil/{{$usercreate->iduser}}" class="name-post">
			{{$usercreate->nameUser}} 
		</a>

		<span class="glyphicon glyphicon-chevron-right" style="@if ($validaruserpost) display: none; @endif color: #757575; font-size: 10px;"> </span>

		<a href="/perfil/{{$userreceiver->iduser}}" style="@if ($validaruserpost) display: none; @endif color: black">
			{{$userreceiver->nameUser}}
		</a>

		<div class="btn-group pull-right btn-delete-post" style="display: @if($validateUser) block @else none @endif">

			<button type="button" class="btn btn-link dropdown-toggle btn-options" data-toggle="dropdown"> <img src="{{asset('/image/icons/points-menu.png')}}" class="points-menu">
			   
			<span class="sr-only">Desplegar menú</span>

			  </button>
			 
			<ul class="dropdown-menu" role="menu">

				<li class="style-li">
					<input type="hidden" value="{{$post->idusertransmitter}}" id="idusertransmitter-{{$post->idpost}}" class="{{$userId}}">

					<button id="{{$post->idpost}}" class="delete-p" value="{{$post->iduserreceiver}}"> Eliminar publicación</button>

				</li>	

			</ul>

		</div>
		
	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 content-post">

		<p>{{$post->description}}</p>

		@if($validatePhotoPost)

			<img src="{{asset('/image/photo-post/'.$post->photopost)}}" class="image-postItem">

		@endif

	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 footer-post">

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 options-post">

			<a  class="link-comment" id="{{$universal}}"><span class="glyphicon glyphicon-comment"></span><span class="comment hidden-xs">Comentar</span></a>

	
			<input type="checkbox" name="likes" id="{{$idcheckbox}}" class="link-like" value="{{$post->idpost}}" @if ($validar) checked @endif>
			<label for="{{$idcheckbox}}">Me gusta</label>				

		</div>

		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6  time-post">
			{{$time_post}}
		</div>

	</div>

	<hr style="border: 0.2px solid #e0e0e0;">


	<div id="all_comments-{{$post->idpost}}" class="all_comments">


	</div>

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comment-post">

		<div class="col-lg-1 img-comment">

			<img src="{{asset('/image/photo-user/'.Auth::user()->photo)}}" class="photo-profile-comment"/>

		</div>

		<div class="col-lg-11 txt-comment">

			<form class="formulario" id="{{$post->idpost}}">

				<input type="hidden" name="postid" value="{{$post->idpost}}" id="postid-{{$post->idpost}}" />

				<textarea class="form-control comment-txt-{{$post->idpost}} textarea3 comment-txt-link-{{$universal}}" placeholder="¿Tienes algo que comentar?" name="comment" id="{{$universal}}"></textarea>

				<button type="submit" class="btn btn-link btn-submit pull-right btn-submit-comment-{{$universal}} " id="btn-submit-link-{{$post->idpost}}" disabled></button> 

				<input type="hidden" value="{{Session::token()}}"  name="_token" id="token_comment_{{$post->idpost}}"/>
			
			</form>

		</div>

	</div>

</div>

<div class="modal fade modal-delete" id="myModal" role="dialog">

	<div class="modal-dialog">

	  	<div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h6 class="modal-title">Eliminar publicación</h6>
	        </div>
	        <div class="modal-body">
	          <p>¿Realmente deseas eliminar la publicación?</p>
	        </div>
	        <div class="modal-footer">

	          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

	          <button type="button" class="btn btn-default btn-delete-modal" id="btn-{{$post->idpost}}">Eliminar</button>

	        </div>

	  	</div>

	</div>

</div>

<div class="modal fade modal-delete" id="warning" role="dialog">

	<div class="modal-dialog">

	  	<div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h6 class="modal-title">¡Advertencia!</h6>
	        </div>
	        <div class="modal-body">
	          <p>Tu no estás permitido para realizar este procedimiento, sólo puede hacerlo el propietario de la publicación.</p>
	        </div>
	        <div class="modal-footer">

	          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>

	        </div>

	  	</div>

	</div>

</div>

@endforeach