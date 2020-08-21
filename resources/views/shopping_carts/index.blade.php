@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Pedidos</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
                <li class="breadcrumb-item active">Pedidos</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Listado de Pedidos</h4>
                @if(Session::has('message'))
                  <div class="alert alert-success">
                    {!! Session::get('message') !!}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  </div>
                @endif
                <ul class="nav nav-tabs profile-tab" role="tablist">
                  <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-selected="true">Pedidos Pentienentes</a> </li>
                  <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">Pedidos Despachados</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home" role="tabpanel">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>Receta</th>
                                      <th>Tipo</th>
                                      <th>Ingredientes</th>
                                      <th>Ver detalles</th>
                                      <th>Despachado</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($shopping_carts as $item)
                                  <tr>
                                    <td>{{ $item->recetas->name}}</td>
                                    <td>{{ $item->recetas->type == 1 ? 'Desayuno' : 'Almuerzo' }}</td>
                                    <td>
                                      @foreach($item->recetas->productos as $ingredientes)
                                      <span>{{$ingredientes->name}} / </span>
                                      @endforeach
                                    </td>
                                    <td>
                                      <a href="{{ route('shopping_cart.detalles',$item->id) }}">Ver detalles</a>
                                    </td>
                                    <td>
                                      <form class="user"  action="{{route('shopping_carts.update', $item->id)}}" method="post">
                                          {{ method_field('put') }}
                                          {{csrf_field()}}
                                          <button class="btn btn-btn-outline-light" type="submit">Despachado</button>
                                      </form>
                                    </td>
                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane" id="profile" role="tabpanel">
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table">
                              <thead>
                                  <tr>
                                      <th>Receta</th>
                                      <th>Tipo</th>
                                      <th>Ingredientes</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach($shopping_carts_ok as $item)
                                  <tr>
                                    <td>{{ $item->recetas->name}}</td>
                                    <td>{{ $item->recetas->type == 1 ? 'Desayuno' : 'Almuerzo' }}</td>
                                    <td>
                                      @foreach($item->recetas->productos as $ingredientes)
                                      <span>{{$ingredientes->name}} / </span>
                                      @endforeach
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
    </div>
</div>
@endsection
