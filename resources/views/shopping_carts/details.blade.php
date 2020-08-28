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
  <div class="col-lg-3 col-xlg-2 col-md-4">
    <div class="stickyside" style="">
      <div class="list-group" id="top-menu">
        @foreach($pedido->recetas->productos as $ingredientes)
          <a class="list-group-item ">{{$ingredientes->name}}</a>
        @endforeach
      </div>
    </div>
    <hr>
    <h3>NOTAS DEL PEDIDO</h3>
    <div class="stickyside" style="">
      <div class="list-group" id="top-menu">
        @foreach($pedido->a_e_integientes as $notas)
          <a class="list-group-item ">Al producto: {{$notas->nombre_ingrediente}}</a>
          @if ($notas->agregar_cantidad > 0)
            <a class="list-group-item ">Añadir: {{$notas->agregar_cantidad}}</a>
          @else
            <a class="list-group-item ">Restar: {{$notas->restar_cantidad}}</a>
          @endif
        @endforeach
      </div>
    </div>
  </div>
  <div class="col-lg-9 col-xlg-10 col-md-8">
      <div class="card">
          <div class="card-body">
            @foreach($pedido->recetas->productos as $ingredientes)
              <h4 class="card-title" id="1">Detalles de Producto {{$ingredientes->name}}</h4>
              <div class="chat-img">
                <img src="{{asset('img/products/'.$ingredientes->image)}}" width="100px" class="img-circle img-fluid" alt="">
              </div>
              <p>{{$ingredientes->sotre->description}}</p>
              <h4>Tienda</h4>
              <div class="chat-img">
                <img src="{{asset('img/stores/'.$ingredientes->sotre->logo)}}" width="100px" class="img-circle img-fluid" alt="">
              </div>
                <p>{{$ingredientes->sotre->name}}</p>
              <hr>
            @endforeach
          </div>
      </div>
  </div>
</div>

@endsection
