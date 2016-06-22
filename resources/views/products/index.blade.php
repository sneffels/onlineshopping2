@extends('layouts.app')
@section('content')
    @if (Entrust::hasRole('administrador'))
     <div class="panel-body">
        <a href="#">
            <button class="btn btn-success">Agregar Producto</button>
        </a>
    </div>
    @endif
    @if (count($products) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Productos disponibles
            </div>

            <div class="panel-body">
                @foreach($products->chunk(4) as $chunk)
                    <div class="row">
                        @foreach($chunk as $product)
                            <div class="col-md-3">
                                <div class="thumbnail">
                                    <img src="{{asset('/images/'.$product->image_path)}}">
                                    <div class="caption">
                                        <h4><strong>{{$product->name}}</strong></h4>
                                        <h5>
                                            <p>Precio:
                                            <strong>{{$product->price}} Bs.
                                            </strong>
                                            </p>
                                        </h5>
                                        <a href="{{url('/products/'.$product->id)}}">
                                            <button class="btn btn-success">Mas informacion</button>
                                        </a>

                                        @if (Entrust::hasRole('administrador'))
                                        <br>
                                        <br>
                                            <a href="#">
                                                <button class="btn btn-success">editar producto</button>
                                            </a>
                                        @endif   
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                @endforeach

            </div>
        </div>
    @endif
@endsection
