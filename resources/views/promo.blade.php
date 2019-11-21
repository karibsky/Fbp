@extends('layout.layout')
@section('content')
<div class="container">
<div class="sale-title-promo">
	<h1>Акции</h1>
</div>
<div class="sale">
	@foreach($promos as $promo)
		<div class="sale-video">
			<iframe src="{{$promo->url}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen width="450" height="250"></iframe>
		</div>
		<div class="sale-title">
			<h2>{{$promo->title}}</h2>
		</div>
  	<div class="col-sm-12 sale-content">
			<p>{{$promo->text}}</p>
		</div>
	@endforeach
</div>
</div>
@endsection