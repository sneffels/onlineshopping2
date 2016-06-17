@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>{{$product->name}}</h3>
        <div class="row">
            <div class="col-md-4">
                <img src="{{url('/images/'.$product->image_path)}}" width="300" height="300">
            </div>
            <div class="col-md-8">
                <h4>Detalles</h4>
                <p>{{$product->description}}</p>
                <h4>Precio</h4>
                <p><strong>{{$product->price}} Bs.</strong></p>
                @if($product->save != 0)
                    <h4>Ahorro</h4>
                    <p><strong>{{$product->save}} Bs.</strong></p>
                    <h5>Antes<p>{{$product->price + $product->save}} Bs.</p></h5>

                @endif
                <a href="{{url('/cart')}}">
                    <button class=" btn btn-success">
                            <span class="glyphicon glyphicon-shopping-cart"></span>
                                Adicionar al carrito
                    </button>
                </a>

            </div>
        </div>
    </div>

@endsection