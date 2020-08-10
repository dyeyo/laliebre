@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Categorias</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
              <li class="breadcrumb-item"><a href="/categorias">Categorias</a></li>
                <li class="breadcrumb-item active">Editar {{$category->name}}</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar Categoria {{$category->name}}</h4>
                <div class="table-responsive">
                    <form action="{{ route('category.update',$category->id) }}" id="formCategorias" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <div class="form-group">
                          <label>Nombre</label>
                          <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control form-control-line">
                        </div>
                        <div class="form-group">
                          <label>Descripcion</label>
                          <textarea  name="description" id="description" class="form-control form-control-line" style="resize: none;">{{$category->description}}</textarea>
                        </div>
                        <div class="form-group">
                          <label>Pasillo perteneciente</label>
                          @if($category->hallway_id == 0)
                            <select id="hallway_id" name="hallway_id" style="width:100%" class="select2 form-control form-control-line" id="">
                              <option value=""></option>
                              @foreach($hallways as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                            </select>
                          @else
                            <select id="hallway_id" name="hallway_id" style="width:100%" class="select2 form-control form-control-line" id="">
                              @foreach($hallways as $item)
                              <option @if($category->hallways->id === $item->id) selected='selected' @endif value="{{$item->id}}">{{$item->name}}</option>
                              @endforeach
                            </select>
                          @endif
                      </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('categories') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
