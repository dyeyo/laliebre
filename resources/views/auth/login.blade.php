@extends('layouts.appLogin')

@section('login')

<section id="wrapper" class="login-register login-sidebar" style="background-image:url({{asset('images/logisn.jpg')}});">
  <div class="login-box card">
      <div class="card-body">
        <form class="form-horizontal form-material" id="loginform" method="POST" action="{{ route('login') }}">
          @csrf
              <a href="/" class="text-center db">
                <img src="{{asset('images/logo.png')}}" width="50%" alt="La Liebre" />
              </a>
              <div class="form-group m-t-40">
                  <div class="col-xs-12">
                    <input id="email" placeholder="Correo Electronico" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-xs-12">
                    <input id="password" placeholder="Contrasena" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
              </div>
              <div class="form-group row">
                  <div class="col-md-12">
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="customCheck1">
                          <label class="custom-control-label" for="customCheck1">Recuerdame</label>
                      </div>
                  </div>
              </div>
              <div class="form-group text-center m-t-20">
                  <div class="col-xs-12">
                      <button class="btn btn-info btn-lg btn-block text-uppercase btn-rounded" type="submit">Entrar</button>
                  </div>
              </div>
              <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                      <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a> </div>
                  </div>
              </div>
          </form>
      </div>
  </div>
</section>
@endsection
