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
                <div class="table-responsive">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre</th>
                                <th>Cliente</th>
                                <th>Dirección de envio</th>
                                <th>Tienda</th>
                                <th>Imagen</th>
                                <th>Ver detalles</th>
                                <th>Despachado</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($shopping_carts as $item)
                            <tr>
                              <td>{{ $item->productos->code}}</td>
                              <td>{{ $item->productos->name}}</td>
                              <td>{{ $item->user->name }} {{ $item->user->lastname }}</td>
                              <td>{{ $item->address }}</td>
                              <td>{{ $item->productos->stores->name}}</td>
                              <td  style="width: 20%" >
                                  <img src="{{url('img/products/'.$item->productos->image)}}" class="img-responsive img-fluid" style="width: 76%;"  alt="">
                              </td>
                              </td>
                              <td><a href="{{ route('shopping_cart_prod.show',$item->user->id) }}">Ver detalles</a> </td>
                              <td>
                                <form class="user"  action="{{route('shopping_cart_prod_admin.update', $item->id)}}" method="post">
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
    </div>
</div>
@endsection
