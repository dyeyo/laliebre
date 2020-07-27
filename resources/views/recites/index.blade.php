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
                          @php $i=1; @endphp
                          @foreach($recipes as $recipe)
                          <tr>
                            <td>{{$i++}}</td>
                            <td>{{$recipe->name}}</td>
                            <td style="width: 20%" >
                                <img src="{{asset('storage/recipes/'.$recipe->image)}}" class="img-responsive img-fluid" style="width: 76%;" alt="">
                            </td>
                            <td>
                              <a href="{{route('receta.show', $recipe->id)}}" class="btn btn-btn-outline-light">Ver</a>
                            </td>
                            <td>
                              <input type="hidden" value="{{$recipe->id}}">
                              <a href="#" class="btn btn-btn-outline-light btn-edit"{{--  data-toggle="modal" data-target="#editModal" --}}>Editar</a>
                            </td>
                            <td>
                              <form class="user"  action="{{route('receta.delete', $recipe->id)}}" method="post">
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

<!-- Modal create -->
@include('recites.modals.create')

<!-- Modal Edit -->
@include('recites.modals.edit')


@endsection
