	<!-- publicaciones y navegacion -->
	

	<input type="hidden" value="{{$user->typeUser}}" id="hidden_typeUser">

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs" id="body-two">
		
		<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>

		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12" id="div-two">

			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" id="div-left">

				<div class="remove">

					<a  class="href-events"  href="/crearEventos" id="link-events" style="display:@if((Auth::id() == $user->iduser) && ($user->typeUser == 'Docente' || $user->typeUser == 'Administrativo')) block @else none @endif;">
						<div id="div-events">
							<span class="glyphicon glyphicon-list-alt icon-list-alt"> </span><span class="events">Crear eventos</span>
						</div>
					</a>

				</div>

				<div class="teachers col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<span class="glyphicon glyphicon-education icon-education"></span>
					<a class="profesores" style="color: black" id="{{$user->iduser}}" href="">

						<span class="title-teachers">Profesores</span> 

					</a>
					<span class="badge" style="margin-left: 10px; background:  teal">{{$follows_count}}</span> 

					<div class="list-teachers" style="height: 100%;">
						@include('layouts.friendsTeachers')
					</div>
					
				</div>

			</div>

			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 content-div-post pull-right">
				<div class="post">
					@include('layouts.post')
				</div>

				<div class="post-item">
					@include('layouts.post-Item')
				</div>
				
			</div>

		</div>

		<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs"></div>

	</div>


	












	


