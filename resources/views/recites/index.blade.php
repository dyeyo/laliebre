@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Recetas</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
              <li class="breadcrumb-item active">Recetas</li>
            </ol>
            <button type="button" class="btn btn-info d-none d-lg-block m-l-15" data-toggle="modal" data-target="#exampleModal">
              <i class="fa fa-plus-circle"></i>
              Agregar Receta
            </button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Listado de Recetas</h4>
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
                                <th>Foto</th>
                                <th>Ver</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Pizza</td>
                            <td>foto</td>
                            <td> <form class="user"  action="{{route('receta.show', 1)}}" method="get">
                              <button class="btn btn-btn-outline-light"   type="submit">Ver</button>
                          </form> </td>
                          <td><form class="user"  action="{{route('category.delete', 1)}}" method="post">

                            {{csrf_field()}}
                            <button class="btn btn-btn-outline-light"   type="submit">Editar</button>
                        </form> </td>
                            <td>
                                <form class="user"  action="{{route('category.delete', 1)}}" method="post">
                                    {{ method_field('delete') }}
                                    {{csrf_field()}}
                                    <button class="btn btn-btn-outline-light"  onclick="return confirm('¿Esta seguro de eliminar este registro?')"  type="submit">ELIMINAR</button>
                                </form>
                            </td>
                        </tr>
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
          <h5 class="modal-title" id="exampleModalLabel">Agregar Receta</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('receta.store') }}" method="post" id="formCategorias">
            @csrf
            <div class="form-group">
              <label>Codigo</label>
              <input type="text" name="code" id="code" class="form-control form-control-line">
          </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="name" id="name" class="form-control form-control-line">
            </div>
            <div class="form-group">
              <label>Ingredientes</label>
              <button type="button" class="btn btn-primary" onclick="agregar()">+</button>
              <button type="button" class="btn btn-primary" onclick="quitar()">-</button>
              <div id="ingrediente"> </div>
          </div>

            <div class="form-group">
                <label>Descripcion</label>
                <textarea name="description" id="description" style="resize:none" class="form-control form-control-line"></textarea>
            </div>
            <div class="form-group">
              <label>Link Video</label>
              <input type="text" name="link" id="link" class="form-control form-control-line">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
          <button type="submit" class="btn btn-primary">Guardar Receta</button>
        </form>

        </div>
      </div>
    </div>
  </div>
  <script>

    function agregar(){


      const elemento = document.getElementById('ingrediente');
      elemento.innerHTML += '<div> <input type="text" class="form-control form-control-line" id="lname" style="width: 15%;" name="nombre" placeholder">' + '<input type="text" class="form-control form-control-line" style="width: 25%;" id="lname" name="lname">'+'<input type="text" style="width: 25%;" class="form-control form-control-line" id="lname" name="lname">'+'<input type="text"  class="form-control form-control-line" style="width: 25%;" id="lname" name="lname">'+'</br> </div>' ;  //
    }

  </script>
@endsection
