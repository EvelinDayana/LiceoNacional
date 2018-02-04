@extends('layouts.nav')

@section('css')

	<link rel="stylesheet" type="text/css" href="{{asset('css/list-friendship.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('css/style-follower.css')}}">

@endsection

@section('title')
Amigos
@endsection

@section('bg')
#f5f5f5
@endsection

@section('content')

	@include('layouts.presentation')

	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 div-box">

		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
			
		</div>

		<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10  sub-div-box-follow">

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 div-title-follow mdl-shadow--2dp">

				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 50%">

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable mdl-textfield--floating-label mdl-textfield--align-right" id="div-search">

                    	<label class="mdl-button mdl-js-button mdl-button--icon"
                       for="fixed-header-drawer-exp" id="label-input-search">
                       		<img src="{{asset('/image/icons/search.png')}}">
                    	</label>

                    	<div class="mdl-textfield__expandable-holder">
                        	<input class="mdl-textfield__input" type="text" name="search" id="fixed-header-drawer-exp" id="	sample6">
                        	<label class="mdl-textfield__label" for="sample6" id="label-search"> </label>
                    	</div>

                	</div>

            	</div> 

            	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 options-tabs">

                	<a href="" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 active link-follower">Seguidores</a>

                	<a href="" class="col-lg-6 col-md-6 col-sm-6 col-xs-6 link-followed">Seguidos</a>	

            	</div>

			</div>

			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>

			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 page-content" id="content-links-follows">
            	
        	</div>

        	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
			
		</div>

		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
			
		</div>

	</div>

@endsection

@section('js')

	<script type="text/javascript" src="{{asset('js/follow.js')}}"></script>

@endsection