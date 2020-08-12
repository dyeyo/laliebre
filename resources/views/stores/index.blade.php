@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Tiendas</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item active">Tiendas</li>
                <li class="breadcrumb-item" >
                  <button type="button" id="btncelular" style="display:none" class="btn btn-info " data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus-circle"></i>
                    Agregar
                  </button>
                </li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i>
              Agregar Tienda
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Listado de Tiendas</h4>
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
                                <th>Descripcion</th>
                                <th>Logo</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($stores as $item)
                            <tr>
                                <td>{{ $item->id}}</td>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->description}}</td>
                                <td  style="width: 20%" >
                                    <img src="{{url('img/stores/'.$item->logo)}}" class="img-responsive img-fluid" style="width: 76%;"  alt="">
                                </td>
                                <td><a href="{{ route('store.edit',$item->id) }}">Editar</a> </td>
                                <td>
                                    <form class="user"  action="{{route('store.delete', $item->id)}}" method="post">
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
          <h5 class="modal-title" id="exampleModalLabel">Agregar Tienda</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('store.store') }}" id="formStore" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Tienda perteneciente</label>
                <select id="store_id" name="store_id" style="width:100%" class="select2 form-control form-control-line" id="">
                    @foreach($typeStores as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Distrito perteneciente</label>
                <select id="district_id" name="district_id[]"  multiple="multiple" style="width:100%" class="select2 form-control form-control-line" id="">
                    @foreach($distritos as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
              <label>Nombre</label>
              <input type="text" id="name" name="name" class="form-control form-control-line">
              <input type="hidden" id="user_id" name="user_id" value={{Auth::user()->id}}>
            </div>
            <div class="form-group">
              <label>Correo Usuario</label>
              <input type="text" id="name" name="emailUser" class="form-control form-control-line">
            </div>
            <div class="form-group">
              <label>Contraseña</label>
              <input type="password" id="password" name="password" class="form-control form-control-line">
            </div>
            <div class="form-group">
              <label>Descripcion</label>
              <textarea  id="description" name="description" id="description" class="form-control form-control-line" style="resize: none;"></textarea>
            </div>

            <div class="form-group">
                <label>Imagen</label>
                <input type="file" id="logo" name="logo" class="form-control form-control-line">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Tienda</button>
        </form>

        </div>
      </div>
    </div>
  </div>
@endsection
