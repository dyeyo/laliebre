@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Editar Mis Datos</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item active">Editar mis datos</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
  <!-- Column -->
  <div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card">
        <img class="card-img" src="{{url('img/users/'.$user->picture)}}" height="456" alt="Card image">
          <div class="card-img-overlay card-inverse text-white social-profile d-flex justify-content-center">
              <div class="align-self-center">
                 <img src="{{url('img/users/'.$user->picture)}}"  class="img-circle" width="100">
                  <h4 class="card-title">{{$user->name}} {{$user->lastname}}</h4>
              </div>
          </div>
      </div>
      <div class="card">
          <div class="card-body"> <small class="text-muted">Correo Electronico</small>
              <h6>{{$user->email}}</h6> <small class="text-muted p-t-30 db">Telefóno/ Celular</small>
              <h6>{{$user->phone}}</h6> <small class="text-muted p-t-30 db">Dirección </small>
              <h6>{{$user->address}}</h6>
          </div>
      </div>
  </div>
  <div class="col-lg-8">
      <div class="card">
          <div class="card-body">
              <h4 class="card-title">Editar mis datos </h4>
              <div class="table-responsive">
                  <form action="{{ route('miperfil.update',$user->id) }}"  id="formTypeStore"  method="post" enctype="multipart/form-data">
                      @csrf
                      {{ method_field('put') }}
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Nombres</label>
                            <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control form-control-line">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Apellidos</label>
                            <input type="text" id="lastname" name="lastname" value="{{$user->lastname}}" class="form-control form-control-line">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Telefóno / Celular</label>
                            <input type="text" id="phone" name="phone" value="{{$user->phone}}" class="form-control form-control-line">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Correo Electronico</label>
                            <input type="text" id="email" name="email" value="{{$user->email}}" class="form-control form-control-line">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Dirección</label>
                            <input type="text" id="address" name="address" value="{{$user->address}}" class="form-control form-control-line">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" id="password" name="password"  class="form-control form-control-line">
                            <span class="text-danger">Llenar este campo solo si se desea cambiar la contraseña</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                          <label>Imagen</label>
                          <input type="file" id="picture" name="picture" class="form-control form-control-line">
                      </div>
                      <div class="form-group">
                          <button type="submit" class="btn btn-primary">Actualizar</button>
                          <a href="/home" class="btn btn-warning">Cancelar</a>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
@endsection
