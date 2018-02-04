@foreach($followeds as $followed)


@php 
	$birthdate = $followed->birthdate;
	$time = strtotime($birthdate);
@endphp


@if(date('m-d') == date('m-d', $time))

	<div>
		adios
	</div>


@endif


@endforeach