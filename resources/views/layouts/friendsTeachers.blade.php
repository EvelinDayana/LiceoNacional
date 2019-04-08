<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12" style="margin: 0; padding: 0; height: 100%;">

	@if($follows_count == 0)

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 100px; display: inline-flex; align-items: center; justify-content: center; border: 1px dashed; margin-bottom: 15px;">

		@if($user->iduser == Auth::id())
		
			Aún no sigues ningún profesor.
		@else
			{{$user->nameUser}} aún no sigue a ningún profesor.
		@endif
		</div>

	@else

	@foreach($follows as $follow)

		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6" style=" height: 115px;  border-radius: 2px; display: flex; justify-content: center; flex-direction: column; text-align: center; margin-bottom: 15px;">

		<a href="">
			<img class="float-left" src="{{asset('/image/photo-user/'.$follow->photo)}}" width="85px" height="85px" style="border-radius: 100%;">
		</a>

		<a href="" style="color: black;">
			{{$follow->nameUser}}
		</a>
		</div>

	@endforeach
	@endif

</div>