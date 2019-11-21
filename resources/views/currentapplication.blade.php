@extends('layout.layout')

@section('content')
	@foreach($currents as $current)
			<div class="services-content">
	        <div class="row">
	            <div class="services-content-title">
	            	<a><h1>{{$current->fullName}}</h1></a>
	            </div>
				<div class="col-md-12">
					<div class="n-img-responsive1">
						<img src="/img/services/{{$current->picture}}">
					</div>
				</div>
			</div>
			<div class="content">
		    	<p>
		    		{{$current->description}}
		    	</p>
	    	</div>
	    </div>
    @endforeach
<style type="text/css">.services-title-elem a, h4 {text-decoration: none; color:#fff;} .services-title-elem a, h4:hover {color:#ffd700;} .services-content {min-height:65vh;}</style>
@endsection