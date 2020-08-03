@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Tipos de Tienda</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/tipoTienda">Tipo de Tienda</a></li>
                <li class="breadcrumb-item active">Editar {{$typeStores->name}}</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar Tipo de Tienda {{$typeStores->name}} </h4>
                <div class="table-responsive">
                    <form action="{{ route('typeStore.update',$typeStores->id) }}"  id="formTypeStore"  method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}

                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="name" name="name" value="{{$typeStores->name}}" class="form-control form-control-line">
                        </div>
                        <div class="form-group">
                            <img src="{{url('img/typeStore/'.$typeStores->image)}}" class="img-responsive img-fluid" style="width: 20%;"  alt="">
                        </div>
                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" id="image" name="logo" class="form-control form-control-line">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('typeStore') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
