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
              <li class="breadcrumb-item active">productos para pedir</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-lg-12">
      <div class="card">
          <div class="card-body">
              <h4 class="card-title">Mis productos para pedir</h4>
              @if(Session::has('message'))
                <div class="alert alert-success">
                  {!! Session::get('message') !!}
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                </div>
              @endif
              <!-- Tab panes -->
              <div class="tab-content">
                  <div class="tab-pane active" id="home" role="tabpanel">
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Producto</th>
                                    <th>Cantidad</th>
                                    <th>Imagen</th>
                                    <th>Proveedor</th>
                                </tr>
                            </thead>
                            <tbody>
                              @isset($prod)
                                @foreach($prod as $item)
                                <tr>
                                  <td>{{ $item->productos->name}}</td>
                                  <td>{{ $item->quantity}}</td>
                                  <td style="width: 20%" >
                                    <img src="{{asset('img/products/'.$item->productos->image)}}" class="img-responsive img-fluid" style="width: 76%;" alt="">
                                  </td>
                                  <td>{{ $item->productos->proveedores->name}}</td>
                                </tr>
                                @endforeach
                              @endisset
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
