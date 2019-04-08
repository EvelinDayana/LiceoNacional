@extends('layouts.nav')

@section('title')
	Liceo Nacional
@endsection

@section('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/createEvent.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/shortEvent.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/largeEvent.css')}}">
@endsection

@section('bg')
	#fff;
@endsection


@section('content')

<div class="container create">

<div class="panel panel-default">

    	
	<div class="panel-heading col-lg-12 col-md-12 col-sm-12 col-xs-12 column-events">

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 events-tabs">

			<a  class="col-lg-6 col-md-6 col-sm-6 col-xs-6 active large-event">Evento largo</a>

    		<a  class="col-lg-6 col-md-6 col-sm-6 col-xs-6 short-event">Evento corto</a>	
			
		</div>
		
	</div>


    <div class="panel-body content-modal-body-events" >
    	
    	@include('largeEvent')

    </div>

  </div>




</div>


@endsection

@section('js')

	<script type="text/javascript" src="{{asset('js/events.js')}}"></script>

	<script type="text/javascript" src="{{asset('js/largeEvent.js')}}"></script>

@endsection