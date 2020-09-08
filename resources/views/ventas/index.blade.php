@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">  Gestion Administrativa</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
              <li class="breadcrumb-item active">Ventas</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
      <div class="card">
          <div class="card-body">
              <h4 class="card-title">Mis Ventas</h4>
              @if(Session::has('message'))
                <div class="alert alert-success">
                  {!! Session::get('message') !!}
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
              @endif
              <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item"> 
                  <a class="nav-link active" data-toggle="tab" href="#home" role="tab" aria-selected="true">
                    Ventas Receta</a> </li>
                <li class="nav-item"> 
                  <a class="nav-link" data-toggle="tab" href="#profile" role="tab" aria-selected="false">
                    Ventas Productos</a> </li>
                <li class="nav-item"> 
                  <a class="nav-link" data-toggle="tab" href="#prod" role="tab" aria-selected="false">
                    Productos mas vendidos</a> </li>
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
                                    <th>Imagen</th>
                                    <th>Tipo</th>
                                    <th>Ingredientes</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ventasRecipes as $item)
                                <tr>
                                  <td>{{ $item->recetas->name}}</td>
                                  <td style="width: 20%" >
                                    <img src="{{asset('img/recetas/'.$item->image)}}" class="img-responsive img-fluid" style="width: 76%;" alt="">
                                  </td>
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
                  <div class="tab-pane" id="profile" role="tabpanel">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Cliente</th>
                                    <th>Direccion de envio</th>
                                    <th>Fecha y hora de entrega</th>
                                    <th>Imagen</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($ventasProd as $item)
                                <tr>
                                  <td>{{ $item->productos->code}}</td>
                                  <td>{{ $item->productos->name}}</td>
                                  <td>{{ $item->user->name }} {{ $item->user->lastname }}</td>
                                  <td>{{ $item->address }}</td>
                                  <td>{{ $item->delivery_date }} - {{$item->delivery_hours}}</td>
                                  <td  style="width: 20%" >
                                      <img src="{{url('img/products/'.$item->productos->image)}}" class="img-responsive img-fluid" style="width: 76%;"  alt="">
                                  </td>
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane" id="prod" role="tabpanel">
                      <div class="card-body">
                        <div class="table-responsive">
                          <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre</th>
                                    <th>Imagen</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($topProd as $item)
                                <tr>
                                  <td>{{ $item->productos->code}}</td>
                                  <td>{{ $item->productos->name}}</td>
                                  <td  style="width: 20%" >
                                    <img src="{{url('img/products/'.$item->productos->image)}}" class="img-responsive img-fluid" style="width: 76%;"  alt="">
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
