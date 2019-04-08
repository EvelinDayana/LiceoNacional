<!DOCTYPE html>
<html>
<head>
	
<script type="text/javascript" src="{{asset('js/shortEvent.js')}}"></script>

</head>
<body>



<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 body">

	<div class="col-lg-2 col-md-2 col-sm-1 hidden-xs"></div>

	<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12">

		<form class="form-short-event" enctype="multipart/form-data">

			<div class="form-group">

				<input type="file" name="photoEvent" class="form-control" accept="image/*" value="Seleccionar una foto" id="filePhotoShortEvent" onchange="fileShortEvent()" required="true"/> 

				<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 div-short">

					<label for="filePhotoShortEvent" class="btn btn-link label-btn-short-event">
						<span class="glyphicon glyphicon-camera icon-large-event"></span>
						Seleccionar una imagen
					</label>

				</div>

				<br>

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 div-short">

					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 div-image-short-event">

						<span class="close">&times;</span>

						<img src="" class="image-short-event">

					</div>

				</div>

				<div align="center" class="div-message-photo"></div>
				<br>

				<input type="text" name="nameEvent" id="nameShortEvent" class="form-control" placeholder="Nombre del evento">

				<div  class="div-message-name"></div>

				<br>

				<input type="text" name="descriptionEvent" id="descriptionShortEvent" class="form-control" placeholder="Descripción del evento">

				<div  class="div-message-desc"></div>

				<br>

				<label for="priceShortEvent">¿El evento es gratuito?</label>

				<div>

					<select   name="priceEvent" id="priceShortEvent" class="form-control">

						<option value="">Elegir una opción</option>
						<option value="si">Si</option>
						<option value="no">No</option>

					</select>

				</div>

				<div class="div-message-price-short-select"></div>

				<br class="space-price-event-short" hidden="hidden">

				<div class="input-group input-short-event" hidden="hidden">

					<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>

					<input type="text" class="form-control" name="price" id="priceEventShort" placeholder="Precio del eveto">

				</div>

				<div class="div-message-price"></div>

				<br>

				<label for="dateEvent">Fecha del evento</label>

				<input type="date" name="startDateEvent" id="dateShortEvent" class="form-control">

				<div class="div-message-dateStart"></div>

				<br>

				<label for="startTimeShortEvent" >Hora del evento</label>

				<input type="time" id="startTimeShortEvent" name="startTimeEvent" class="form-control">

				<div  class="div-message-hourStart"></div>

				<br>

				<input type="text" name="placeEvent" id="placeShortEvent" placeholder="Lugar" class="form-control">

				<div class="div-message-place"></div>
				
			    <br>

			    <input type="hidden" name="_token" value="{{Session::token()}}" id="token_short_event"/>

			    <div class="mdl-card mdl-shadow--2dp" id="snackbar_shortEvent_message">El evento ha sido creado satisfactoriamente.</div>

			    <button class="btn  btn-block btn-submit-short-event" id="{{Auth::user()->typeUser}}">Crear Evento</button>


			</div>

		</form>

	</div>

	<div class="col-lg-2 col-md-2 col-sm-1 hidden-xs"></div>


</div>

</body>
</html>