@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{url('product/update/'.$product->id)}}" method="post"  class="form-horizontal" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT">

            {{ csrf_field() }}


            <div class="row">
                <div class="col-md-6">
                    <img src="{{'/images/'.$product->image_path}}" height="200" width="200" alt="Imagen del producto" id="imgProfile">
                    <input class="form-control" type="file" id="file-select" onchange="previewFile()" name="image_path">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" name="name" value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input class="form-control" name="description" value="{{$product->description}}">
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input class="form-control" name="price" value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label>Descuento</label>
                        <input class="form-control" name="save" value="{{$product->save}}">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Guardar cambios</button>

        </form>
    </div>

@endsection
<script>
    function previewFile() {
        var preview = document.getElementById('imgProfile');
        var file    = document.querySelector('input[type=file]').files[0];
        var reader  = new FileReader();

        reader.addEventListener("load", function () {
            preview.src = reader.result;
            showtext.innerHTML=reader.result;

        }, false);

        if (file) {
            reader.readAsDataURL(file);
        }
    }
</script>
