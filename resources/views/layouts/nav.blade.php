
<header class="topbar">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
      <!-- ============================================================== -->
      <!-- Logo -->
      <!-- ============================================================== -->
      <div class="navbar-header" style="background: #4f5467; !important">
            <b>
              <img src="{{asset('images/logo.png')}}" style="width: 50%" alt="La Liebre" class="light-logo" />
            </b>
      </div>
      <!-- ============================================================== -->
      <!-- End Logo -->
      <!-- ============================================================== -->
      <div class="navbar-collapse">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)">
                  <i class="ti-menu"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)">
                  <i class="icon-menu"></i>
                </a>
              </li>
          </ul>
          <ul class="navbar-nav my-lg-0">
            <li class="nav-item dropdown u-pro">
              <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img style="float: right;
                margin-right: 34px;
                margin-top: 12px;" src="{{ asset('images/logo.png') }}" width=5% alt="users" class="">
                <span style="float: right;
                margin-right: -83px;
                margin-top: 6px;" class="hidden-md-down"> &nbsp;<i class="fa fa-angle-down"></i></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right animated flipInY">
                  <!-- text-->
                  <div class="dropdown-divider"></div>
                  <a href="{{ route('logout') }}" class="dropdown-item"><i class="fa fa-power-off"></i> Salir</a>
                  <!-- text-->
              </div>
            </li>
          </ul>
      </div>
  </nav>
</header>
<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
      <nav class="sidebar-nav">
        <ul id="sidebarnav">
          <li class="nav-small-cap  ">--- ADMINISTRACIÓN</li>
          <li>
              <a class="waves-effect waves-dark" href="/home"><i class="fas fa-home"></i><span class="hide-menu">Inicio</span></a>
          </li>
          <li>
              <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fas fa-store"></i><span class="hide-menu">Gestion de Tiendas</span></a>
              <ul aria-expanded="false" class="collapse">
                  <li><a href="{{ route('typeStore') }}">Tipo de Tiendas</a></li>
                  <li><a href="{{ route('stores') }}">Tiendas</a></li>
              </ul>
          </li>
          <li>
              <a class="waves-effect waves-dark" href="{{route('categories')}}"><i class="fas fa-boxes"></i><span class="hide-menu">Gestion de Categorias</span></a>
          </li>
          <li>
          <a class="waves-effect waves-dark" href="{{route('products')}}"><i class="fas fa-shopping-basket"></i><span class="hide-menu">Gestion de Productos</span></a>
          </li>
          <li>
              <a class="waves-effect waves-dark" href="{{route('distritos')}}"><i class="fas fa-map-marked"></i><span class="hide-menu">Gestion de Distritos</span></a>
          </li>
          <li>
              <a class="waves-effect waves-dark" href="{{route('pasillos')}}"><i class="fas fa-tags"></i><span class="hide-menu">Gestion de Pasillos</span></a>
          </li>
          <li>
              <a class="waves-effect waves-dark" href="index.html"><i class="fas fa-clipboard"></i><span class="hide-menu">Gestion de Recetas</span></a>
          </li>
        </ul>
      </nav>
      <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>
