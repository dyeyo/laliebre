@extends('layouts.app')
@section('content')
<div class="row page-titles">
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Receta {{$receta->name}}</h4>
    </div>
    <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="/home">Inicio</a></li>
              <li class="breadcrumb-item"><a href="/recetas">Recetas</a></li>
                <li class="breadcrumb-item active"> Ver receta</li>
            </ol>
        </div>
    </div>
</div>
<div class="row">
  <!-- Column -->
  <div class="col-lg-4 col-xlg-3 col-md-5">
      <div class="card"> <img class="card-img" src="{{asset('img/recetas/'.$receta->image)}}" height="456" alt="Card image">
          <div class="card-img-overlay card-inverse text-white social-profile d-flex justify-content-center">
              <div class="align-self-center">
                  <h4 class="card-title">{{$receta->name}}</h4>
                  <h6 class="card-subtitle">{{$receta->store->name}}</h6>
                  <p class="text-white">
                    {{$receta->description}}
                  </p>
              </div>
          </div>
      </div>
      <div class="card">
          <div class="card-body">
            <small class="text-muted">Nombre de la Receta</small>
              <h6>{{$receta->store->name}}</h6>
            <small class="text-muted p-t-30 db">Tienda Propietaria</small>
              <h6>{{$receta->store->name}}</h6>
              <small class="text-muted p-t-30 db">Descripcion de la receta</small>
              <h6> {{$receta->description}}</h6>
              <div class="map-box">
                <iframe src="{{URL::to($receta->link)}}" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen=""></iframe>
              </div>
          </div>
      </div>
  </div>
  <!-- Column -->
  <!-- Column -->
  <div class="col-lg-8 col-xlg-9 col-md-7">
      <div class="card">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs profile-tab" role="tablist">
              <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Ingredientes</a> </li>
              <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Detalles</a> </li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content">
              <div class="tab-pane active" id="home" role="tabpanel">
                  <div class="card-body">
                      <div class="profiletimeline">
                          <div class="sl-item">
                              <div class="sl-left">
                                 <img src="{{asset('img/recetas/'.$receta->image)}}" alt="user" class="img-circle"> </div>
                              <div class="sl-right">
                              <div><a href="javascript:void(0)" class="link">{{$receta->name}}</a>
                                <span class="sl-date">{{$receta->created_at}}</span>
                                      <p>
                                        <b>Ingredientes</b>
                                        @foreach($receta->productos as $ingredientes)
                                          <span>{{$ingredientes->name}} - </span>
                                        @endforeach
                                      </p>
                                      <div class="row">
                                        @foreach($receta->productos as $imgProducto)
                                          <div class="col-lg-3 col-md-6 m-b-20">
                                            <img src="{{asset('img/products/'.$imgProducto->image)}}" class="img-responsive radius">
                                          </div>
                                        @endforeach
                                      </div>
                                      {{-- <div class="like-comm"> <a href="javascript:void(0)" class="link m-r-10">2 comment</a> <a href="javascript:void(0)" class="link m-r-10"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div> --}}
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!--second tab-->
              <div class="tab-pane" id="profile" role="tabpanel">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-3 col-xs-6 b-r">
                            <h2 class="text-muted">
                              {{$receta->name}}
                            </h2>
                          </div>
                      </div>
                      <hr>
                      <p class="m-t-30">
                        <p  class="text-muted">Ingredientes</p>
                        {{$receta->description}}
                      </p>
                  </div>
              </div>
              <div class="tab-pane" id="settings" role="tabpanel">
                  <div class="card-body">
                      <form class="form-horizontal form-material">
                          <div class="form-group">
                              <label class="col-md-12">Full Name</label>
                              <div class="col-md-12">
                                  <input type="text" placeholder="Johnathan Doe" class="form-control form-control-line">
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="example-email" class="col-md-12">Email</label>
                              <div class="col-md-12">
                                  <input type="email" placeholder="johnathan@admin.com" class="form-control form-control-line" name="example-email" id="example-email">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-md-12">Password</label>
                              <div class="col-md-12">
                                  <input type="password" value="password" class="form-control form-control-line">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-md-12">Phone No</label>
                              <div class="col-md-12">
                                  <input type="text" placeholder="123 456 7890" class="form-control form-control-line">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-md-12">Message</label>
                              <div class="col-md-12">
                                  <textarea rows="5" class="form-control form-control-line"></textarea>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-12">Select Country</label>
                              <div class="col-sm-12">
                                  <select class="form-control form-control-line">
                                      <option>London</option>
                                      <option>India</option>
                                      <option>Usa</option>
                                      <option>Canada</option>
                                      <option>Thailand</option>
                                  </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-12">
                                  <button class="btn btn-success">Update Profile</button>
                              </div>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Column -->
</div>
@endsection
