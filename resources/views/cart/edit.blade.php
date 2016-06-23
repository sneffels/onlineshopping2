@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>{{$product->product->name}}</h3>
        <div class="row">
            <div class="col-md-4">
                <img src="{{url('/images/'.$product->product->image_path)}}" width="300" height="300">
            </div>
            <div class="col-md-8">
                <h4>Detalles</h4>
                <p>{{$product->product->description}}</p>
                <h4>Precio</h4>
                <p><strong>{{$product->product->price}} Bs.</strong></p>
                @if($product->product->save != 0)
                    <h4>Ahorro</h4>
                    <p><strong>{{$product->product->save}} Bs.</strong></p>
                    <h5>Antes<p>{{$product->product->price + $product->product->save}} Bs.</p></h5>
                @endif
                <form action="{{url('productdetail/update/'.$product->id)}}" method="post" >
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">


                    <label>Cantidad</label>
                    <input type="text" value="{{$product->quantity}}" name="quantity">
                    <button class="btn btn-info" type="submit">
                        Guardar cambios
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection