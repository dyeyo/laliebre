@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Tipos de Tienda</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">inicio</a></li>
                <li class="breadcrumb-item"><a href="/tiendas">Tiendas</a></li>
                <li class="breadcrumb-item active">Editar {{$store->name}}</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar tienda {{$store->name}}</h4>
                <div class="table-responsive">
                    <form action="{{ route('store.update',$store->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <div class="form-group">
                            <label>Tienda perteneciente</label>
                            <select name="store_id" style="width:100%" class="select2 form-control form-control-line" id="">
                                @foreach($typeStores as $item)
                                  <option @if($store->typeStore->id === $item->id) selected='selected' @endif value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Distrito perteneciente</label>
                            <select name="district_id" style="width:100%" class="select2 form-control form-control-line" id="">
                                @foreach($distritos as $item)
                                <option @if($store->distritos->id === $item->id) selected='selected' @endif  value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" name="name" value="{{$store->name}}" class="form-control form-control-line">
                            <input type="hidden" name="user_id" value={{Auth::user()->id}}>
                        </div>
                        <div class="form-group">
                            <label>Descripcion</label>
                            <textarea  name="description" id="description" class="form-control form-control-line" style="resize: none;">{{$store->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <img src="{{url('img/typeStore/'.$store->logo)}}" class="img-responsive img-fluid" style="width: 20%;"  alt="">
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
