@extends('layouts.app')

@section('content')
<div class="container text-center">
<h2>products</h2>

<div class="row">
@if(isset($products))
@foreach($products as $product)
<div class="col-md-4">
<div class="card">

<img src="{{asset('default-image.png')}}" alt="" class="card-img-top" height="400" width="100">
<div class="card-body">

<h4 class="card-link"> {{$product->name}} </h4>
<p class="card-text">{{$product->description}}</p>
<p class="card-text">${{$product->price}}</p>
</div>

<div class="card-body">
<a href="{{route('add.cart',$product->id)}}" class="card-link">Add to card</a>

</div>
</div>
</div>
@endforeach
@endif
</div>
</div>
@endsection
