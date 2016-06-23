@extends('layouts.app')
@section('content')
    <div class="container">
        <form action="{{url('product')}}" method="post"  class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="row">
                <div class="col-md-6">
                    <img src="" height="200" width="200" alt="Imagen del producto" id="imgProfile">
                    <input class="form-control" type="file" id="file-select" onchange="previewFile()" name="image_path">
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nombre</label>
                        <input class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label>Descripcion</label>
                        <input class="form-control" name="description">
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input class="form-control" name="price">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Adicionar</button>

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
