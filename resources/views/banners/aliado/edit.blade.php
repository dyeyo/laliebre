@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Banners App</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
              <li class="breadcrumb-item"><a href="/banners">Banners</a></li>
              <li class="breadcrumb-item active">Editar</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Editar Banner</h4>
                <div class="table-responsive">
                    <form action="{{ route('bannerLiebre.update',$banner->id) }}" id="" method="post" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('put') }}
                        <div class="row">
                          <div class="col-md-6">
                            <img src="{{url('img/bannerAliado/'.$banner->image)}}" class="img-responsive img-fluid" alt="">
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Imagen</label>
                              <input type="file" name="image" id="image" class="form-control form-control-line">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            <a href="{{ route('pasillos') }}" class="btn btn-warning">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
