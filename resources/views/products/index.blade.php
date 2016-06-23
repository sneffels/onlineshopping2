@extends('layouts.app')
@section('content')
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
                                        @if(Auth::user())
                                            @if(Auth::user()->role == 'admin')
                                            <a href="{{url('/products/edit/'.$product->id)}}">
                                                <button class="btn btn-success">Modificar</button>
                                            </a>
                                            @endif
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
