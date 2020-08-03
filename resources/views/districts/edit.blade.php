@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Distritos</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
              <li class="breadcrumb-item"><a href="/distritos">Distritos</a></li>
              <li class="breadcrumb-item active">Editar {{$district->name}}</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar Distrito {{$district->name}}</h4>
                <div class="table-responsive">
                    <form action="{{ route('distritos.update',$district->id) }}" id="formDistrito" method="post">
                        @csrf
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label>Nombre Distrito</label>
                            <input type="text" name="name" id="name"  value="{{$district->name}}" class="form-control form-control-line">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('distritos') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
