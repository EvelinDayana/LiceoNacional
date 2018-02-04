<!-- Ventana modal configuración de cuenta -->

<div id="configuration" class="modal face" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">

				<button  type="button" class="close" data-dismiss="modal">&times;</button>

				<strong class="title-header-form-update">Actualizar datos</strong>

			</div>

			<div class="modal-body form-update"  align="center">

				<form class="form-user-update">

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input class="mdl-textfield__input" type="text" name="name-update" id="form-name" value="{{Auth::user()->nameUser}}" required/>
						<label class="mdl-textfield__label" for="form-name" id="label-name">Nombre</label>
						<input type="hidden" name="name-user" value="{{Auth::user()->nameUser}}" id="name-user-update">
					</div>

					<div class=" mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input type="text" name="lastname-update" class="mdl-textfield__input" id="form-lastname" value="{{Auth::user()->lastname}}" required/>
						<label for="form-lastname" class="mdl-textfield__label" id="label-lastname">Apellido</label>	
						<input type="hidden" name="lastname-user" value="{{Auth::user()->lastname}}" id="lastname-user-update">				
					</div>

					<div class=" mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input type="password" name="lastname-update" class="mdl-textfield__input" id="form-password" data-toggle="modal" data-target="#change-password" readonly="true"/>
						<label for="form-password" class="mdl-textfield__label" id="label-password">Contraseña</label>						
					</div>

					<br>

					<input type="hidden" id="token" value="{{Session::token()}}" name="_token">

					<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--primary btn-form-configuration" id="{{Auth::id()}}" style="background: #ffb300;">
					Guardar cambios</button>

				</form>
				
			</div>
			
		</div>
	</div>
</div>

<!-- Cambiar contraseña usuario -->

<div class="modal fade" tabindex="-1" id="change-password" role="dialog">

	<div class="modal-dialog">

		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<div class="modal-body">

				<form class="form-update-password">

					<input type="hidden" name="password" value="{{Auth::user()->password}}" id="update-password">
				
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input type="password" name="old_password" class="mdl-textfield__input" id="update-old-password"/>
						<label class="mdl-textfield__label" for="update-old-password" id="label-old-password">Contraseña actual</label>					
					</div>

					<br>

					<div class="password-old-incorrect"></div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input type="password" name="new_password" class="mdl-textfield__input" id="update-new-password" min="6"/>
						<label class="mdl-textfield__label" for="update-new-password" id="label-new-password">Nueva contraseña</label>					
					</div>

					<br>

					<div class="box-message"></div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
						<input type="password" name="password_confirmation" class="mdl-textfield__input" id="update-password-conformation" min="6" />
						<label class="mdl-textfield__label" for="update-password-conformation" id="label-password-confirmation">Confirmar contraseña</label>					
					</div>

					<br>
					<div class="message"></div>
					<div class="password-new-incorrect"></div>


					<br>

					<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" id="btn-change-password" type="submit">Guardar cambios</button>

					<input type="hidden" id="token" value="{{Session::token()}}" name="_token">

				</form>

			</div>

		</div>
		
	</div>

</div>

<!-- Cambiar foto usuario -->

<div id="change-photo-profile" class="modal fade"  role="dialog" tabindex="-1">

	<div class="modal-dialog modal-sm">

		<div class="modal-content">

			<div class="modal-header">

				<button class="close" type="button" data-dismiss="modal">
					&times;
				</button>

				<strong class="title-header-form-update">Actualizar foto de perfil</strong>
				
			</div>

			<div class="modal-body" id="modal-body-update-photo">

			<form method="POST" action="/foto" enctype="multipart/form-data">

				<input type="file" name="user-photo" class="form-control" accept="image/*" value="Elegir una foto" id="file" onchange="previewFile()" required="true"/> 

				<label for="file" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
					<span class="glyphicon glyphicon-camera"></span>
					Seleccionar Imagen
				</label>

				<br>

				<img  id="image-user"/>

				<br>
			
				<button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored" id="file-image">Guardar cambios </button>

				<input type="hidden" name="_token" value="{{Session::token()}}" id="token">

			</form>

			</div>
		</div>

	</div>

</div>