@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">  Productos</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
              <li class="breadcrumb-item active">Productos</li>
              <li class="breadcrumb-item" >
                <button type="button" id="btncelular" style="display:none" class="btn btn-info " data-toggle="modal" data-target="#exampleModal">
                  <i class="fa fa-plus-circle"></i>
                  Agregar
                </button>
              </li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i>
              Agregar Producto
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Listado de Productos</h4>
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
                            @foreach($products as $item)
                            <tr>
                                <td>{{ $item->code}}</td>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->description}}</td>
                                <td  style="width: 20%" >
                                  <img src="{{url('img/products/'.$item->image)}}" class="img-responsive img-fluid" style="width: 76%;"  alt="">
                                </td>
                                <td><a href="{{ route('product.edit',$item->id) }}">Editar</a> </td>
                                <td>
                                    <form class="user"  action="{{route('product.delete', $item->id)}}" method="post">
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
          <h5 class="modal-title" id="exampleModalLabel">Agregar Producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('product.store') }}" id="formProductos" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Categoria perteneciente</label>
                <select id="" name="categorie_id" style="width:100%" class="select2 form-control form-control-line" id="">
                  <option value=""></option>
                    @foreach($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="store_id"  value="{{$onlyID}}" id="">
              @if($onlyID == 2)
                <div class="form-group">
                  <label>Pasillo perteneciente</label>
                  <select  name="hallway_id" style="width:100%" class="select2 form-control form-control-line" id="hallway_id">
                    <option value=""></option>
                      @foreach($hallways as $item)
                      <option value="{{$item->id}}">{{$item->name}}</option>
                      @endforeach
                  </select>
                </div>
              @endif
              <div class="form-group" id="proveedor">
                <label>Proveedor</label>
                <select  name="provider_id" style="width:100%" class="select2 form-control form-control-line" id="">
                  <option value=""></option>
                    @foreach($proveedor as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
              </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" id="" name="name" class="form-control form-control-line">
            </div>
            <div class="form-group">
                <label>Descripcion</label>
                <input type="text" id="" name="description" class="form-control form-control-line">
            </div>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Codigo</label>
                  <input type="text" id="" name="code" class="form-control form-control-line">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Catidad</label>
                  <input type="text" id="quantity" name="quantity" class="form-control form-control-line">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Unidad de Medida</label>
                  <select id="um" name="um" style="width:100%" class="form-control form-control-line" id="">
                    <option disabled="disabled" value="">Seleccionar una opcion</option>
                    <option value="Gm">Gm</option>
                    <option value="Ml">Ml</option>
                </select>
                </div>
              </div>
            </div>
            <div class="form-group">
                <label>Precio</label>
                <input type="text" id="" name="price" class="form-control form-control-line">
            </div>

            <div class="form-group">
                <label>Imagen</label>
                <input type="file" id="" name="image" class="form-control form-control-line">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Producto</button>
        </form>
        </div>
      </div>
    </div>
  </div>
@endsection
