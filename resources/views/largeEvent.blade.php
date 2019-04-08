<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 body">


	<div class="col-lg-2 col-md-2 col-sm-1 hidden-xs"></div>

	<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">

		<form class="form-large-event" nctype="multipart/form-data">

			<div class="form-group">

				<input type="file" name="photoEvent" class="form-control" accept="image/*" value="Seleccionar una foto" id="filePhotoLargeEvent" onchange="fileLargeEvent()"/> 
				<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 div">

					<label for="filePhotoLargeEvent" class="btn btn-link label-btn-large-event">
						<span class="glyphicon glyphicon-camera icon-large-event"></span>
						Seleccionar una imagen
					</label>

				</div>

				<br>

				<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 div">
					<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12  div-image-event">

						<span class="close">&times;</span>

						<img src="" class="image-large-event">

					</div>
				</div>

				<div align="center" class="div-message-photo"></div>

				<br>

				<input type="text" name="nameEvent" id="nameEvent" class="form-control" placeholder="Nombre del evento">

				<div  class="div-message-name"></div>

				<br>

				<input type="text" name="descriptionEvent" id="descriptionEvent" class="form-control" placeholder="Descripción del evento">

				<div  class="div-message-desc"></div>

				<br>

				<label for="priceEvent" >¿El evento es gratuito?</label>

				<div>

					<select  name="priceEvent" id="priceEvent" class="form-control">

						<option value="">Elegir una opción</option>
						<option value="si">Si</option>
						<option value="no">No</option>

					</select>

				</div>

				<div class="div-message-price-large-select"></div>

				<br class="space-price-event-large" hidden="hidden">

				<div class="input-group input-price-large-event" hidden="hidden">

					<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>

					<input type="text" class="form-control" name="price" id="priceEventLarge" placeholder="Precio del evento">

				</div>

				<div class="div-message-price"></div>

				<br>

				<label for="dateEvent">Fecha de inicio</label>

				<input type="date" name="startDateEvent" id="dateEventStart" class="form-control">

				<div class="div-message-dateStart"></div>

				<br>

				<label for="dateEvent">Fecha de finalización</label>

				<input type="date" name="finishDateEvent" id="dateEventFinish" class="form-control">

				<div  class="div-message-dateFinish"></div>

				<br>

				<label for="timeEvent" >Hora de inicio</label>

				<input type="time" id="startTimeEvent" name="startTimeEvent" class="form-control">

				<div  class="div-message-hourStart"></div>

				<br>

				<label for="timeEvent" >Hora de finalización</label>

				<input type="time" id="finishTimeEvent" name="finishTimeEvent" class="form-control">

				<div  class="div-message-hourFinish"></div>

				<br>

				<input type="text" name="placeEvent" id="placeEvent" placeholder="Lugar" class="form-control">

				<div class="div-message-place"></div>

				<br>


			    <input type="hidden" name="_token" value="{{Session::token()}}" id="token_large_event"/>

			    <div class="mdl-card mdl-shadow--2dp" id="snackbar_largeEvent_message">El evento ha sido creado satisfactoriamente.</div>

			    <button class="btn  btn-block btn-submit-large-event" id="{{Auth::user()->typeUser}}">Crear Evento</button>

			</div>

		</form>
	</div>

	<div class="col-lg-2 col-md-2 col-sm-1 hidden-xs"></div>

</div>
