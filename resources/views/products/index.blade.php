@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">  Productos</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Table Basic</li>
            </ol>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                Agregar Producto
              </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Basic Table</h4>
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
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Categoria perteneciente</label>
                <select name="categorie_id" class="form-control form-control-line" id="">
                    @foreach($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control form-control-line">
            </div>
            <div class="form-group">
                <label>Descripcion</label>
                <input type="text" name="description" class="form-control form-control-line">
            </div>
            <div class="form-group">
                <label>Codigo</label>
                <input type="text" name="code" class="form-control form-control-line">
            </div>
            <div class="form-group">
                <label>Precio</label>
                <input type="text" name="price" class="form-control form-control-line">
            </div>
            <div class="form-group">
                <label>Tienda perteneciente</label>
                <select name="store_id" class="form-control form-control-line" id="">
                    @foreach($stores as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Imagen</label>
                <input type="file" name="image" class="form-control form-control-line">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Guardar Producto</button>
        </form>

        </div>
      </div>
    </div>
  </div>
@endsection
