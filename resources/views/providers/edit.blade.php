@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Tipos de Pasillos</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item"><a href="/pasillos">Pasillos</a></li>
              <li class="breadcrumb-item active">Editar {{$provider->name}}</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar proveedor {{$provider->name}}</h4>
                <div class="table-responsive">
                    <form action="{{ route('proveedor.update',$provider->id) }}" id="formPasillos" method="post">
                        @csrf
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label>Nombre proveedor</label>
                            <input type="text" name="name" id="name" value="{{$provider->name}}" class="form-control form-control-line">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('proveedores') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
