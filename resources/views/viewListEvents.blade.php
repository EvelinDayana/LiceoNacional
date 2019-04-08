@extends('layouts.nav')

@section('title')
	Eventos
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/events.css')}}">
@endsection

@section('content')

	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 div-body-viewEvents" id="div-body-viewEvents">

		<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 hidden-xs col-small-events"></div>

		<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-xs-12 div-content table-responsive">

			<table class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 ">

				<tr class="mdl-shadow--2dp">
					<td>
						<span></span>
					</td>
					<td class="td-name">
						<span>Nombre</span>
					</td>

					<td class="td-description">
						<span>Descripción</span>
					</td>
					<td class="td-place">
						<span>Lugar</span> 
					</td>
					<td class="td-date">
						<span>Fecha</span>
					</td>
					
					<td class="td-hour">
						<span>Hora</span>
					</td>

					<td class="td-price">
						<span>Precio</span>
					</td>
				</tr>

			

				@foreach($events as $event)

					<tr  class="mdl-shadow--2dp">
						<td>
							<span><img id="image-tournament" src="{{asset('/image/photo-event/'.$event->photoEvent)}}"></span>
						</td>
						<td class="td-name-content">
							<span>{{$event->nameEvent}}</span>
						</td>

						<td class="td-description-content">
							<span>{{$event->descriptionEvent}}</span>
						</td>

						<td class="td-place-content">
							<span>{{$event->place}}</span>
						</td>

						<td class="td-date-content">
							<span>{{date('d-m-Y', strtotime($event->startDate))}}</span>
						</td>

						

						<td class="td-hour-content">
							<span>{{date('h:i', strtotime($event->startTime))}}</span>
						</td>

						<td class="td-price-content">
							<span class="span-price-event">$ @if($event->priceEvent == "") 0 @else  {{$event->priceEvent}} @endif</span>
						</td>

					</tr>

				@endforeach

			</table>

			<div align="center" class="pagination col-lg-12 col-md-12 col-sm-12 col-xs-12">
				{!!$events->render()!!}
			</div>

		</div>
	    	
		<div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 hidden-xs col-small-events"></div>
		 
	</div>
@endsection

@section('js')
	<script type="text/javascript" src="{{asset('js/viewEvents.js')}}"></script>
@endsection