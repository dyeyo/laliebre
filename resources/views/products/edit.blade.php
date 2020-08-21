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
                    <form action="{{ route('product.update',$product->id) }}"  id="formProductosEdit" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        @if($product->categorie_id != null)
                          <div class="form-group">
                            <label>Categoria pertenecientse</label>
                            <select id="categorie_id" name="categorie_id" style="width:100%" class="select2 form-control form-control-line" id="">
                                @foreach($categories as $item)
                                <option @if($product->categories->id === $item->id) selected='selected' @endif value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        @endif
                        @if($product->hallway_id != null)
                          <div class="form-group">
                            <label>Pasillo perteneciente</label>
                            <select id="hallway_id" name="hallway_id" style="width:100%" class="select2 form-control form-control-line" id="">
                                @foreach($hallways as $item)
                                <option @if($product->hallways->id === $item->id) selected='selected' @endif value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                          </div>
                        @endif
                        @if($product->provider_id != null)
                        <div class="form-group" id="proveedor">
                          <label>Proveedor</label>
                          <select  name="provider_id" style="width:100%" class="select2 form-control form-control-line" id="">
                            <option value=""></option>
                              @foreach($proveedor as $item)
                              <option @if($product->proveedores->id === $item->id) selected='selected' @endif value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                          </select>
                        </div>
                        @endif
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" id="name" name="name" value="{{$product->name}}" class="form-control form-control-line">
                        </div>

                        <div class="form-group">
                            <label>Descripcion</label>
                            <textarea  name="description" id="description" class="form-control form-control-line" style="resize: none;">{{$product->description}}</textarea>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Precio</label>
                              <input type="text" id="price"id="price" name="price" value="{{$product->price}}" class="form-control form-control-line">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Cantidad</label>
                              <input type="text" id="quantity" name="quantity"  value="{{$product->quantity}}" class="form-control form-control-line">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Codigo</label>
                              <input type="text" id="code" value="{{$product->code}}" name="code" class="form-control form-control-line">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Unidad de Medida</label>
                              <select id="um" name="um" style="width:100%" class="form-control form-control-line">
                                <option disabled="disabled" value="">Seleccionar una opcion</option>
                                @if($product->um == "Gr")
                                  <option value="Gr">Gr</option>
                                  <option value="ml">ml</option>
                                @else
                                  <option value="ml">ml</option>
                                  <option value="Gr">Gr</option>
                                @endif
                            </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label>Medida general</label>
                              <input type="text" id="umGeneral" value="{{$product->umGeneral}}" name="umGeneral" class="form-control form-control-line">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <img src="{{url('img/products/'.$product->image)}}" class="img-responsive img-fluid" style="width: 20%;"  alt="">
                        </div>
                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" id="image" name="image" class="form-control form-control-line">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('products') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
