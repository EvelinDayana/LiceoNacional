<!--modal edit record -->

	<div id="edit-record" role="dialog" class="modal fade">

		<div class="modal-dialog">
   
		    <div class="modal-content">

			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Trabajo actual</h4>
			    </div>

		      	<div class="modal-body">

			        <p class="title-modal">Empresa</p>

			    	<form action="" method="" id="form_record">

						<div class="input-group modal-div-nameJob">

						    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>

						    <input id="company-name" type="text" class="form-control" name="company_name" placeholder="Nombre" value="{{Auth::user()->name_job}}">

						    <input type="hidden" id="hidden_company" value="{{Auth::user()->name_job}}">

					  	</div>

					  	<div class="div-message-name-job"></div>

					  	<br>

					  	<div class="input-group modal-div-positionJob">

						    <span class="input-group-addon"><i class="glyphicon glyphicon-folder-open"></i></span>

						    <input id="position" type="text" class="form-control" name="position" placeholder="Cargo desempeñado" value="{{Auth::user()->position_job}}">

						    <input type="hidden" id="hidden_position" value="{{Auth::user()->position_job}}">

					  	</div>

					  	<div class="div-message-position"></div>

					  	<br>


						<label for="date" class="date">Fecha de inicio</label>

						<div class="input-group modal-div-dateJob">

						    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>

						    <input id="date" type="date" class="form-control" name="date_entry" value="{{Auth::user()->date_job}}">

						    <input type="hidden" id="hidden_dateEntry" value="{{Auth::user()->date_job}}">

						</div>
						<div class="div-message-date-job"></div>

						<input type="hidden" name="_token" value="{{Session::token()}}" id="token_update_record">

					</form>

		      	</div>

		      	<div class="modal-footer">

		        	<button  class="btn btn-link cancel-btn" data-dismiss="modal">Cancelar</button> o <button type="button" class="btn btn-default update_record" id="{{Auth::id()}}">Guardar</button>

		     	 </div>

		    </div>

  		</div>

	</div>