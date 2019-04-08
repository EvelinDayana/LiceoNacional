<!--Modal location-->

<div class="modal fade" id="edit-location" role="dialog">

		<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-header">

					<button type="button" class="close" data-dismiss="modal">&times;</button>

					<h4 class="modal-title">Ubicación actual</h4>
					
				</div>

				<div class="modal-body">

				<form action="" method="" id="form_location">

					<label for="modal-departament" id="modal-departament" class="label-departament">Departamento</label>

					<div class="input-group div-modal-departament">

						<span class="input-group-addon">
							<i class="glyphicon glyphicon-globe"></i>
						</span>	

						<select class="form-control select-departament" id="modal-departament" name="departament">

							<option value="">Seleccionar departamento</option>
							@foreach($departaments as $departament)
								<option value="{{$departament->id}}"> {{$departament->name_state}}</option>
							@endforeach
							
						</select>

						<input type="hidden" value="{{Auth::user()->departament}}" id="hidden_departament">

					</div>

					<div class="div-message-departament"></div>

					<br class="space-departament">

					<label for="modal-city" class="label-city">Municipio</label>

					<div class="input-group div-modal-city">

						<span class="input-group-addon">
							<i class="glyphicon glyphicon-globe"></i>
						</span>

						<select class="form-control select-city" name="city" id="modal-city">
							<option value="">Seleccionar municipio</option>
						</select>

						<input type="hidden" id="hidden_city" value="{{Auth::user()->city}}">
						
					</div>

					<div class="div-message-city"></div>

					<br class="space-city">

					<div class="input-group div-modal-address">

						<span class="input-group-addon">
							<i class="glyphicon glyphicon-list-alt"></i>
						</span>

						<input type="text" name="address" id="modal-address" placeholder="Dirección actual" class="form-control">

						<input type="hidden" id="hidden_address" value="{{Auth::user()->address}}">

					</div>

					<div class="div-message-address"></div>

					<br class="space-address">

					<div class="input-group div-modal-cellphone">
						<span class="input-group-addon">
							<i class="glyphicon glyphicon-phone"></i>
						</span>

						<input type="text" name="cellphone" class="form-control" id="modal-cellphone" placeholder="Número celular">

						<input type="hidden" id="hidden_cellphone" value="{{Auth::user()->cellphone}}">
						
					</div>

					<div class="div-message-cellphone"></div>

					<input type="hidden" name="_token" value="{{Session::token()}}" id="token_update_location">

				</form>

				</div>

				<div class="modal-footer">

					<button class="btn btn-link" data-dismiss="modal">
						Cancelar
					</button>
						o
					<button type="button" class="btn btn-default update_location" id="{{Auth::id()}}">
						Guardar
					</button>
					
				</div>
			</div>
		</div>
	</div>