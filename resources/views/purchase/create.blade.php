@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6" style="padding: 5%">
                <form action="{{url('/user/cart/purchase')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label> Nro tarjeta de credito</label>
                        <input type="text" class="form-control" name="creditCardNumber">
                    </div>
                    <div class="form-group">
                        <label> Proveedor</label>
                        <input type="text" class="form-control" name="provider">
                    </div>
                    <button type="submit" class="btn btn-info" onclick="successmessage()">
                        Realizar compra
                    </button>
                </form>
            </div>
            <div class="col-md-6" style="background-color: lightgray">
                Resumen de la compra
                <table class="table" style="font-size: 12px">
                    <thead>
                        <tr>
                            <th>
                                Nombre
                            </th>
                            <th>
                                Precio
                            </th>
                            <th>
                                Cantidad
                            </th>
                            <th>
                                Subtotal
                            </th>
                        </tr>
                    </thead>
                    <tbody style="font-weight: lighter">
                    @foreach($products as $product)

                        <tr>

                            <th>
                                {{$product->product->name}}

                            </th>
                            <th>{{$product->product->price}}</th>
                            <th>{{$product->quantity}}</th>
                            <th>{{$product->product->price * $product->quantity}}</th>

                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
<script>
    function successmessage()
    {
        alert('Se regitro su compra exitosamente!');
    }
</script>