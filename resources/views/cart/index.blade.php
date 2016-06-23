@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-6">
                <a href="{{url('products')}}">
                    <button class="btn btn-success">
                        Continuar viendo
                    </button>
                </a>
            </div>
            <div class="col-md-6" style="text-align: right">
                <a href="{{url('user/cart/purchase')}}">
                    <button class="btn btn-warning">
                <span class="glyphicon glyphicon-credit-card">
                </span>
                        Comprar
                    </button>
                </a>
            </div>


        </div>


        <table class="table">
            <thead>
            <tr>
                <th></th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <?php
                $total=0;
            ?>
            @foreach($products as $product)
                <?php $total+=($product->product->price)*$product->quantity?>
                    <tr>
                        <th>
                            <img src="{{'/images/'.$product->product->image_path}}" width="100" height="100">
                        </th>
                        <th>
                            {{$product->product->name}}

                        </th>
                        <th>{{$product->product->price}}</th>
                        <th>{{$product->quantity}}</th>
                        <th>{{$product->product->price * $product->quantity}}</th>
                        <th>
                            <form action="{{url('productdetail/'.$product->id)}}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger" type="submit">
                                    Quitar del carro
                                </button>
                            </form>
                            <a href="{{url('/user/cart/product/'.$product->id.'/modify')}}">
                                <button class="btn btn-info">
                                    Modificar cantidad
                                </button>
                            </a>

                        </th>
                    </tr>
            @endforeach
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th>TOTAL</th>
                <th>{{$total.' Bs'}}</th>
            </tr>
        </table>
    </div>

@endsection