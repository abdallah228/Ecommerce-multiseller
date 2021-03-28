@extends('layouts.app')
@section('content')

<h2> your cart</h2>
{{-- {{dd(\Cart::session(auth()->user()->id)->getContent())}} --}}

<table class="table">
    <thead>
        <tr>
            <th>name</th>
            <th>price per unit</th>
            <th>total price</th>
            <th>quantity</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cartItems as $item)

            <tr>
                <td scope="row">{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>
                    {{-- // You can also get the sum of the Item multiplied by its quantity, see below: --}}
                   {{ $summedPrice = Cart::session(auth()->user()->id)->get($item->id)->getPriceSum() }}
                </td>
                <td>
                    <form action="{{route('cart.update',$item->id)}}" method="post">
                    @csrf
                    <input type="number" value="{{$item->quantity}}" name='qty'>
                    <input type="submit" value="save">
                    </form>

                </td>
                <td>
                        <a href="{{route('cart.destroy',$item->id)}}">delete</a>
                </td>
            </tr>
            @endforeach
    </tbody>
</table>
<h3>Total price : ${{ Cart::session(auth()->user()->id)->getTotal()}}</h3>
<a href="" name="" class="btn btn-primary" role="button">process to checkout</a>

@endsection
