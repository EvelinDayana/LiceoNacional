<!--Modal academic information-->

	<div id="edit-academic-information" role="dialog" class="modal fade">

		<div class="modal-dialog">
   
		    <div class="modal-content">

			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Información académica</h4>
			    </div>

		      	<div class="modal-body">

			    	<form id="form_academic_information">

						<label for="date" class="label-dateEntry">Fecha de ingreso</label>

						<div class="input-group modal-div-dateEntry">

						    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>

						    <input type="hidden" value="{{Auth::user()->yearEntry}}" id="hidden_entry"> 

						    <input id="dateEntry" type="date" class="form-control" name="dateEntry" value="{{Auth::user()->yearEntry}}">

						</div>

						<div class="div-message-dateEntry"></div>

						<br>

						<label for="dateDeparture" class="label-dateDeparture">Fecha de salida</label>

						<div class="input-group modal-div-dateDeparture">

						    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>

						    <input type="hidden" value="{{Auth::user()->yearDeperture}}"  id="hidden_deperture">

						    <input id="dateDeparture" type="date" class="form-control" name="dateDeparture" value="{{Auth::user()->yearDeperture}}">

						</div>

						<div class="div-message-dateDeperture"></div>

						<br class="space-dateDeparture">

						<div class="div_course">

							<label for="course" class="label-course">Grado actual </label>

						  	<div class="form-group modal-div-course" style="">

						  		<input type="hidden" value="{{Auth::user()->course}}" id="hidden_course">

							    <select class="form-control" id="course" name="course" required="true">
							    	<option value="">Elegir una opción</option>


							    @foreach($courses as $course)
							    	<option value="{{$course->id}}" @if(Auth::user()->course == $course->id) selected @endif> {{$course->course}}</option>
							    @endforeach
							    </select>

						  	</div>

						  	<div class="div-message-course"></div>

					  	</div>

					  	<div class="remove">

						<br class="space-course">

					  	<label for="emphasis" class="label-emphasis">Enfasis</label>

					  	<div class="form-group modal-div-emphasis">

					  		<input type="hidden" value="{{Auth::user()->emphasis}}" id="hidden_emphasis">

						    <select class="form-control" id="emphasis" name="emphasis">
						    	<option value="">Seleccionar enfásis</option>
						    	<option value="Derechos Humanos" @if(Auth::user()->emphasis == "Derechos Humanos")   selected  @endif>Derechos humanos</option>
						    	<option value="Ciencias Naturales" @if(Auth::user()->emphasis == "Ciencias Naturales")   selected  @endif>Ciencias naturales</option>
						    	<option value="Manejo del discurso" @if(Auth::user()->emphasis == "Manejo del discurso")   selected  @endif>Manejo del discurso</option>
						    	<option value="Sena" @if(Auth::user()->emphasis == "Sena")   selected  @endif>Sena</option>

						    </select>

						    <div class="div-message-emphasis"></div>

					  	</div>

						</div>

					  	
					  	<input type="hidden" name="_token" value="{{Session::token()}}" id="token_update_academic_information"/>

					</form>

		      	</div>

		      	<div class="modal-footer">

		        	<button  class="btn btn-link cancel-btn" data-dismiss="modal">Cancelar</button> o <button type="button" class="btn btn-default update_academic_information" id="{{Auth::id()}}">Guardar</button>

		     	 </div>

		    </div>

  		</div>

	</div>