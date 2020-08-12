@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Tienda</h4>
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
                  <form action="{{ route('store.update',$store->id) }}"  id="formStore" method="post" enctype="multipart/form-data">
                      @csrf
                      {{ method_field('put') }}
                      <div class="form-group">
                          <label>Distrito perteneciente</label>
                          <select id="district_id" name="district_id[]"  multiple="multiple" style="width:100%" class="select2 form-control form-control-line" id="">
                            @foreach($distritos as $item)
                              <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                          </select>
                      </div>
                      </div>
                      <div class="form-group">
                          <label>Nombre</label>
                          <input type="text" id="name" name="name" value="{{$store->name}}" class="form-control form-control-line">
                          <input type="hidden" id="user_id" name="user_id" value={{Auth::user()->id}}>
                      </div>
                      <div class="form-group">
                          <label>Descripcion</label>
                          <textarea  id="description" name="description" id="description" class="form-control form-control-line" style="resize: none;">{{$store->description}}</textarea>
                      </div>

                      <div class="form-group">
                          <img src="{{url('img/typeStore/'.$store->logo)}}" class="img-responsive img-fluid" style="width: 20%;"  alt="">
                      </div>
                      <div class="form-group">
                          <label>Imagen</label>
                          <input type="file" id="logo" name="logo" class="form-control form-control-line">
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Actualizar</button>
                          <a href="{{ route('stores') }}" class="btn btn-warning">Cancelar</a>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <div class="col-lg-8">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Distritos Inscritos a {{$store->name}}</h4>
        <div class="table-responsive">
          <table class="table">
              <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Eliminar</th>
                  </tr>
              </thead>
              <tbody>
                @foreach($storeDistritos as $item)
                  </tr>
                      <td>{{$item->name}}</td>
                      <td>
                        <form class="user"  action="{{route('distrito_store.delete', $item->distritos_store_stores_id)}}" method="post">
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
@endsection
