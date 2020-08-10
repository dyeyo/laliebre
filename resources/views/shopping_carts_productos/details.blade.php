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
  <div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card">
          <div class="card-body"> <small class="text-muted">A nombre de </small>
            <h6>{{$usuarioPedido->name}} {{$usuarioPedido->lastname}}</h6>
            <small class="text-muted p-t-30 db">Telefóno</small>
            <h6>{{$usuarioPedido->phone}} </h6>
          </div>
      </div>
  </div>
  <div class="col-lg-8 col-xlg-9 col-md-7">
    <div class="card">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs profile-tab" role="tablist">
          <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Productos</a> </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active" id="home" role="tabpanel">
              @foreach($pedido as $item)
                <div class="card-body">
                  <div class="profiletimeline">
                    <div class="sl-item"> 
                      <div class="sl-left"> 
                        <img src="{{url('img/products/'.$item->image)}}" class="img-responsive img-fluid" style="width: 76%;"  alt="">
                        <div class="sl-right">
                          <div>
                            <h5 class="sl-date">{{$item->name}}</h5>
                          </div>
                        </div>
                      </div>
                      <h5 class="sl-date">Tienda: {{$item->tiendaName}}</h5>
                      <hr>
                  </div>
                </div>
              </div>
                      <br>

            @endforeach

        </div>
    </div>
  </div>
</div>
{{-- <div class="row">
  <div class="col-lg-10 col-xlg-10 col-md-10">
      {{$pedido->total}}
      {{$pedido->productos->name}}
      <img src="{{asset('img/products/'.$pedido->productos->image)}}" width="100px" class="img-circle img-fluid" alt="">

      <div class="card">
        <div class="card-body">
          @foreach($pedido->productos as $item)
            <h4 class="card-title" id="1">Detalles de Producto {{$item->name}}</h4>
            <div class="chat-img">
              <img src="{{asset('img/products/'.$item->image)}}" width="100px" class="img-circle img-fluid" alt="">
            </div>
          @endforeach
        </div>
      </div> 
  </div>
</div> --}}

@endsection
