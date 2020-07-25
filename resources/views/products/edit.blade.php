@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Productos</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
              <li class="breadcrumb-item"><a href="/productos">Productos</a></li>
                <li class="breadcrumb-item active">Editar {{$product->name}}</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar producto {{$product->name}}</h4>
                <div class="table-responsive">
                    <form action="{{ route('product.update',$product->id) }}"  id="formProductos" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label>Categoria perteneciente</label>
                            <select id="categorie_id" name="store_id" style="width:100%" class="select2 form-control form-control-line" id="">
                                @foreach($categories as $item)
                                <option @if($product->categories->id === $item->id) selected='selected' @endif value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tienda perteneciente</label>
                            <select id="store_id" name="store_id" style="width:100%" class="select2 form-control form-control-line" id="">
                                @foreach($stores as $item)
                                <option @if($product->stores->id === $item->id) selected='selected' @endif value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Pasillo perteneciente</label>
                            <select id="store_id" name="store_id" style="width:100%" class="select2 form-control form-control-line" id="">
                                @foreach($hallways as $item)
                                <option @if($product->hallways->id === $item->id) selected='selected' @endif value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="name" name="name" value="{{$product->name}}" class="form-control form-control-line">
                        </div>
                        <div class="form-group">
                          <label>Codigo</label>
                          <input type="text" id="code"id="description" name="code" value="{{$product->code}}" class="form-control form-control-line">
                        </div>
                        <div class="form-group">
                            <label>Descripcion</label>
                            <textarea  id="code" name="description" id="description" class="form-control form-control-line" style="resize: none;">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                          <label>Precio</label>
                          <input type="text" id="price"id="price" name="price" value="{{$product->price}}" class="form-control form-control-line">
                      </div>
                        <div class="form-group">
                            <img src="{{url('img/typeStore/'.$product->image)}}" class="img-responsive img-fluid" style="width: 20%;"  alt="">
                        </div>
                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" id="image" name="logo" class="form-control form-control-line">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Actualziar</button>
                            <a href="{{ route('products') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
