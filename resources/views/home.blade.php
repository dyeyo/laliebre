@extends('layouts.app')

@section('content')
  <div class="row page-titles">
      <div class="col-md-5 align-self-center">
      <h4 class="text-themecolor">Bienvenido {{Auth::user()->name}}</h4>
      </div>
      <div class="col-md-7 align-self-center text-right">
          <div class="d-flex justify-content-end align-items-center">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Inicio</a></li>
              </ol>
          </div>
      </div>
  </div>
  @if(Session::has('message'))
  <div class="alert alert-success">
    {!! Session::get('message') !!}
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  </div>
@endif
<div class="card-group">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div>
              <h3><i class="fas fa-shopping-cart"></i></h3>
              <p class="text-muted">PRODUCTOS TOTAL VENDIDOS</p>
            </div>
            <div class="ml-auto">
              @isset($totalVentasProd)
              <h2 class="counter text-primary">{{$totalVentasProd}}</h2>
              @endisset
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div>
              <h3><i class="fas fa-shopping-cart"></i></h3>
              <p class="text-muted">RECETAS TOTAL VENDIDAS</p>
            </div>
            <div class="ml-auto">
              @isset($totalVentasRecetas)
              <h2 class="counter text-cyan">{{$totalVentasRecetas}}</h2>
              @endisset
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex no-block align-items-center">
            <div>
              <h3><i class="fas fa-users"></i></h3>
              <p class="text-muted">TOTAL CLIENTES</p>
            </div>
            <div class="ml-auto">
              @isset($totalUsuarios)
              <h2 class="counter text-purple">{{$totalUsuarios}}</h2>
              @endisset
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  This is some text within a card block.
              </div>
          </div>
      </div>
  </div>
@endsection
