@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Pasillos</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item active">Pasillos</li>
                <li class="breadcrumb-item" >
                  <button type="button" id="btncelular" style="display:none" class="btn btn-info " data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus-circle"></i>
                    Agregar
                  </button>
                </li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i>
              Agregar Proveedor
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Listado de Proveedores</h4>
                @if(Session::has('message'))
              <div class="alert alert-success">
                {!! Session::get('message') !!}
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              </div>
            @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($providers as $item)
                            <tr>
                                <td>{{ $item->id}}</td>
                                <td>{{ $item->name}}</td>
                                <td><a href="{{ route('proveedor.edit',$item->id)}}">Editar</a> </td>
                                <td>
                                    <form class="user"  action="{{route('proveedor.delete', $item->id)}}" method="post">
                                        {{ method_field('delete') }}
                                        {{csrf_field()}}
                                        <button class="btn btn-btn-outline-light"  onclick="return confirm('¿Esta seguro de eliminar este registro?')"  type="submit">ELIMINAR</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar Proveedor</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('proveedor.store') }}" id="formPasillos" method="post">
            @csrf
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" id="name" class="form-control form-control-line">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Proveedor</button>
        </form>

        </div>
      </div>
    </div>
  </div>
@endsection
