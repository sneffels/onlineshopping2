@extends('layouts.app')
@section('content')
    <div class="container">
        @if (count($products) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>
                                PRODUCTOS DISPONIBLES
                            </strong>

                        </div>
                        <div class="col-md-6" style="text-align: right;">
                            @if(Auth::user())
                                @if(Auth::user()->role=='admin')
                                    <a href="product/create" style="font-size: 30px">
                                <span class="glyphicon glyphicon-plus-sign">
                                </span>
                                    </a>
                                @endif
                            @endif
                        </div>
                    </div>



                </div>
                <div class="panel-body">
                    @foreach($products->chunk(4) as $chunk)
                        <div class="row">
                            @foreach($chunk as $product)
                                <div class="col-md-3">
                                    <div class="thumbnail">
                                        <img src="{{asset('/images/'.$product->image_path)}}" height="100">
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
                                                    <a href="{{url('/product/edit/'.$product->id)}}">
                                                        <button class="btn btn-warning">
                                                            <span class="glyphicon glyphicon-edit">

                                                            </span>
                                                        </button>
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
    </div>

@endsection
