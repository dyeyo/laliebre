@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Tipos de Tienda</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Table Basic</li>
                <li class="breadcrumb-item active">Editar {{$category->name}}</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic Table</h4>
                <h6 class="card-subtitle">Add class <code>.table</code></h6>
                <div class="table-responsive">
                    <form action="{{ route('category.update',$category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" value="{{$category->name}}" class="form-control form-control-line">
                        </div>
                        <div class="form-group">
                            <label>Descripcion</label>
                            <textarea  name="description" id="description" class="form-control form-control-line" style="resize: none;">{{$category->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Actualziar</button>
                            <a href="{{ route('typeStore') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
