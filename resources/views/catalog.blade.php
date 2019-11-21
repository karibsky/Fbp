@extends('layout.layout')

@section('content')
<div class="product-dropdown">
	<form method="GET" action="/catalog">
		<div class="input-group">
			<input type="search" class="form-control1" placeholder="Поиск" name="keywords" required="required" 
			value="<?php $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; $str = parse_str(parse_url($url, PHP_URL_QUERY), $output); if(!empty($output['keywords'])) { echo str_replace(' ', '', $output['keywords']); } else echo '';?>">
			<div class="input-group-btn">
				<button class="btn btn-default" type="submit">
					<i class="fa fa-search fa-1x" aria-hidden="true"></i>
				</button>
			</div>
		</div>
	</form>
	<center>
		<div class="btn-category">
			<a class="btn" type="submit" href="{{url('catalog')}}">Все товары</a>
			@foreach($categories as $category)
			<a class="btn" type="submit" href="{{url('catalog/'.$category->id)}}">{{$category->text}}</a>
			@endforeach
		</div>
		<div>
			@if(isset($subs))•
			@foreach($subs as $subcategory)
			<b><a class="subcategories" type="submit" href="{{url('catalog/'.$subcategory->idcategory.'/'.$subcategory->id)}}">{{$subcategory->text}}</a></b>&nbsp;•
			@endforeach
			@endif
		</div>
	</center>
	@if($errors->any())
	<br>
	<div class="alert alert-danger"><h5><i class="fa fa-exclamation-circle" aria-hidden="true">&nbsp;</i>{{$errors->first()}}</h5>
	</div>
	@endif
	<div class="row">
		@foreach($catalogs as $catalog)
		<div class="col-md-4 col-sm-4">
			<div class="product-dropdown-body">
				<div class="product-img">
					<img src="{{ asset('img/catalog/'.$catalog -> picture) }}"/>
					<div class="product-price">
						<p class="product-dropdown-description">
							{{$catalog -> description}}
						</p>
						<p>Артикул: {{$catalog -> article}}</p>
					</div>
				</div>
				@if($catalog->redarea != '')
				<div class="ribbon">
					{{$catalog -> redarea}}
				</div>
				@endif
				@if($catalog->greenarea != '')
				<div class="ribbon2">
					{{$catalog->greenarea}}
				</div>
				@endif
				<div class="product-review">
					<h3 class="product-dropdown-title"><a>{{$catalog -> name}}</a></h3>
					<div class="product-dropdown-bar">
						@if($catalog-> price != 0)
						<span>{{$catalog -> price}} руб.</span>
						@else
						<span>Договорная</span>
						@endif
					</div>
					<div class="button-test">
						<a class="product-button" href="/cart/add/{{$catalog -> id}}">Заказать</a>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<center>
	{{ $catalogs->appends(request()->query())->links() }}
</center>
<style>
.pagination > li > a,
.pagination > li > span {
    color: #000; 
}

.pagination > .active > a,
.pagination > .active > a:focus,
.pagination > .active > a:hover,
.pagination > .active > span,
.pagination > .active > span:focus,
.pagination > .active > span:hover {
    background-color: #000;
    border-color: #000;
}
</style>
@endsection