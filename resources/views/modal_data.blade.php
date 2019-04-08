<!--Modal data-->

	<div id="edit-data" role="dialog" class="modal fade">

		<div class="modal-dialog">

			<div class="modal-content">

				<div class="modal-header">
					<button class="close" type="button" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Datos personales</h4>
				</div>

				<div class="modal-body">

				<form action="" method="" id="form_data">

					<label for="birthdate" class="label-birthdate">Fecha de nacimiento</label>
 
					<div class="input-group div-modal-birthdate">

					    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>

					    <input type="hidden" value="{{Auth::user()->birthdate}}"  id="hidden_birthdate">

					    <input id="birthdate" type="date" class="form-control" name="birthdate" value="{{Auth::user()->birthdate}}">

					</div>

					<div class="div-message-birthday"></div>

					<br class="space-birthdate">

					<div class="remove_data">

						<label class="label-gender col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">Sexo</label>

						<div class="radio-inline">

							<input type="hidden" value="{{Auth::user()->sex}}" id="hidden_gender">

	  						<label class="title" for="input-sex-fem">
	  							<input  id="input-sex-fem" type="radio" name="sex" value="femenino" @if(Auth::user()->sex == "femenino") checked @endif />Femenino
	  						</label>
	  						
						</div>

						<div class="radio-inline">

	  						<label class="title" for="input-sex-masc">

	  							<input id="input-sex-masc" type="radio" name="sex" value="masculino" @if(Auth::user()->sex == "masculino") checked @endif />Masculino
	  							
	  						</label>

						</div>

						<div class="div-message-gender"></div>

					</div>
						
					<input type="hidden" name="_token" value="{{Session::token()}}" id="token_update_data"/>

				</form>

				</div>

				<div class="modal-footer">

					<button class="btn btn-link" data-dismiss="modal">
						Cancelar
					</button>
						o
					<button class="btn btn-default update_data" type="button" id="{{Auth::id()}}">
						Guardar
					</button>
					
				</div>



			</div>

		</div>

	</div>