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
                <li class="breadcrumb-item active">Editar {{$product->name}}</li>
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
                    <form action="{{ route('product.update',$product->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label>Categoria perteneciente</label>
                            <select name="store_id" class="form-control form-control-line" id="">
                                @foreach($categories as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
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
                            <label>Nombre</label>
                            <input type="text" name="name" value="{{$product->name}}" class="form-control form-control-line">
                        </div>
                        <div class="form-group">
                            <label>Codigo</label>
                            <textarea  name="code" id="description" class="form-control form-control-line" style="resize: none;">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Descripcion</label>
                            <textarea  name="description" id="description" class="form-control form-control-line" style="resize: none;">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <img src="{{url('img/typeStore/'.$product->image)}}" class="img-responsive img-fluid" style="width: 20%;"  alt="">
                        </div>
                        <div class="form-group">
                            <label>Imagen</label>
                            <input type="file" name="logo" class="form-control form-control-line">
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
