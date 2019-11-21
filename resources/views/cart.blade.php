@extends('layout.layout')
@section('content')
<div class="container">
	<style type="text/css">
	.product-image {
		float: left;
		width: 20%;
	}
	.product-details {
		float: left;
		width: 37%;
	}
	.product-price {
		float: left;
		width: 12%;
	}
	.product-quantity {
		float: left;
		width: 10%;
	}
	.product-removal {
		float: left;
		width: 9%;
	}
	.product-line-price {
		float: left;
		width: 12%;
		text-align: right;
	}
	/* This is used as the traditional .clearfix class */
	.group:before, .shopping-cart:before, .column-labels:before, .product:before, .totals-item:before, .group:after, .shopping-cart:after, .column-labels:after, .product:after, .totals-item:after {
		content: '';
		display: table;
	}
	.group:after, .shopping-cart:after, .column-labels:after, .product:after, .totals-item:after {
		clear: both;
	}
	.group, .shopping-cart, .column-labels, .product, .totals-item {
		zoom: 1;
	}

	.product .product-price:after, .product .product-line-price:after, .totals-value:after {
		content: ' Р';
	}

	label {
		color: #000;
	}
	.shopping-cart {
		margin-top: -45px;
	}
	/* Column headers */
	.column-labels label {
		padding-bottom: 15px;
		margin-bottom: 15px;
		border-bottom: 1px solid #eee;
	}
	.column-labels .product-image, .column-labels .product-details, .column-labels .product-removal {
		text-indent: -9999px;
	}
	/* Product entries */
	.product {
		margin-bottom: 20px;
		padding-bottom: 10px;
		border-bottom: 1px solid #eee;
	}
	.product .product-image {
		text-align: center;
	}
	.product .product-image img {
		width: 100px;
	}
	.product .product-details .product-title {
		font-size: 30px;
		text-align: left;
		margin:0;
		padding: 0;
	}
	.product .product-details .product-description {
		margin: 5px 20px 5px 0;
		line-height: 1.4em;
	}
	.product .product-quantity input {
		width: 40px;
	}
	.product .remove-product {
		border: 0;
		padding: 4px 8px;
		background-color: #000;
		text-decoration: none;
		color: #fff;
		font-size: 12px;
		border-radius: 0px;
	}
	.product .remove-product:hover {
		color: #ffd700;
	}
	/* Totals section */
	.totals .totals-item {
		float: right;
		clear: both;
		width: 100%;
		margin-bottom: 10px;
	}
	.totals .totals-item label {
		float: left;
		clear: both;
		width: 79%;
		text-align: right;
	}
	.totals .totals-item .totals-value {
		float: right;
		width: 21%;
		text-align: right;
	}
	.button-cart{
		text-align: right;
		margin:30px 0px;
		
	}
	.button-cart a{
		text-decoration: none;
	}
	.shopping-cart-title h1{
		margin-bottom: 15px;
	}
	.checkout:hover {
		background-color: #494;
	}
	/* Make adjustments for tablet */
	@media screen and (max-width: 650px) {
		.shopping-cart {
			margin: 0;
			padding-top: 20px;
			border-top: 1px solid #eee;
		}
		.column-labels {
			display: none;
		}
		.product-image {
			float: right;
			width: auto;
		}
		.product-image img {
			margin: 0 0 10px 10px;
		}
		.product-details {
			float: none;
			margin-bottom: 10px;
			width: auto;
		}
		.product-price {
			clear: both;
			width: 70px;
		}
		.product-quantity {
			width: 100px;
		}
		.product-quantity input {
			margin-left: 20px;
		}
		.product-quantity:before {
			content: 'x';
		}
		.product-removal {
			width: auto;
		}
		.product-line-price {
			float: right;
			width: 70px;
		}
	}
	/* Make more adjustments for phone */
	@media screen and (max-width: 350px) {
		.product-removal {
			float: right;
		}
		.product-line-price {
			float: right;
			clear: left;
			width: auto;
			margin-top: 10px;
		}
		.product .product-line-price:before {
			content: 'Item Total: ₽';
		}
		.totals .totals-item label {
			width: 60%;
		}
		.totals .totals-item .totals-value {
			width: 40%;
		}
	}
	.number { 
	  opacity: 1;
	  padding: 0px;
	  margin: 0px;
	}
</style>
<div class="shopping-cart-title">
	<h1>Корзина</h1>
</div>
<div class="shopping-cart">
	<div class="column-labels">
		<label class="product-image">Изображение</label>
		<label class="product-details">Product</label>
		<label class="product-price">Цена</label>
		<label class="product-quantity">Кол-во</label>
		<label class="product-removal">Удалить</label>
		<label class="product-line-price">Стоимость</label>
	</div>
	@if (Session::has('cart'))
	@foreach(Session::get('cart') as $carts => $value)
	<form method="POST" action="order">
			{{ csrf_field() }}
	<div class="product">
		<div class="product-image">
			<img src="public/img/catalog/{{$value['3']}}">
		</div>
		<div class="product-details">
			<h3 class="product-description">{{ $value['1'] }}</h3>
		</div>
		<div class="product-price">{{ $value['2'] }}</div>
		<div class="product-quantity">
			<input type="number" value="{{ $value['4'] }}" min="1"  name="number[]" class="number"/>
			<input type="hidden" name="idproducts[]" value="{{$value['0']}}">
		</div>
		<div class="product-removal">
			<a class="remove-product" href="/cart/delete/{{ $carts }}">
				Удалить
			</a>
		</div>
		<div class="product-line-price">{{ $value['2'] }}</div>
	</div>
	@endforeach

	@else
	Корзина пуста
	@endif

	<div class="totals">
		<div class="totals-item totals-item-total">
			<label>Всего</label>
			<div class="totals-value" id="cart-total"></div>
		</div>
	</div>
	<div class="button-cart">
			<button class="product-button" type="submit">Купить</a>
			</form>
		</div>
		@if($errors->any())
		<div class="alert alert-success"><h5><i class="fa fa-exclamation-circle" aria-hidden="true">&nbsp;</i>{{$errors->first()}}</h5>
		</div>
		@endif

	</div>
	<!-- Session::forget('cart.' . $index); -->

</div>

<script type="text/javascript">
	var taxRate = 0.05;
	var shippingRate = 15.00; 
	var fadeTime = 300;


	window.onload = function() {
		recalculateCart();
	};
	/* Assign actions */
	$('.product-quantity input').change( function() {
		updateQuantity(this);
	});

	$('.product-removal button').click( function() {
		removeItem(this);
	});


	/* Recalculate cart */
	function recalculateCart()
	{
		var subtotal = 0;

		$('.product').each(function () {
			subtotal += parseFloat($(this).children('.product-line-price').text());
		});

		var total = subtotal;

		$('.totals-value').fadeOut(fadeTime, function() {
			$('#cart-total').html(total.toFixed(2));
			if(total == 0){
				$('.checkout').fadeOut(fadeTime);
			}else{
				$('.checkout').fadeIn(fadeTime);
			}
			$('.totals-value').fadeIn(fadeTime);
		});
	}


	function updateQuantity(quantityInput)
	{

		var productRow = $(quantityInput).parent().parent();
		var price = parseFloat(productRow.children('.product-price').text());
		var quantity = $(quantityInput).val();
		var linePrice = price * quantity;


		productRow.children('.product-line-price').each(function () {
			$(this).fadeOut(fadeTime, function() {
				$(this).text(linePrice.toFixed(2));
				recalculateCart();
				$(this).fadeIn(fadeTime);
			});
		});  
	}

	function removeItem(removeButton)
	{
		var productRow = $(removeButton).parent().parent();
		productRow.slideUp(fadeTime, function() {
			productRow.remove();
			recalculateCart();
		});
	}
</script>
@endsection


