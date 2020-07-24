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
