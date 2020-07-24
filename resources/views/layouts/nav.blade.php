<header class="topbar">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
      <div class="navbar-header">
        <a class="navbar-brand" href="/home">
          <b>
              <img src="{{ asset('img/logo.png') }}" alt="homepage" style="width: 95%" class="light-logo">
          </b>
          <a class="navbar-brand" href="/home"><b>
           </b>
         </a>
      </div>
      <div class="navbar-collapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"> <a class="nav-link sidebartoggler d-md-block waves-effect waves-dark" href="javascript:void(0)">
            <i class="fas fa-bars"></i></a> </li>
          </ul>
          <ul class="navbar-nav my-lg-0">
            <li class="nav-item right-side-toggle">
              <a class="nav-link  waves-effect waves-light" href="">
                <i class="fas fa-sign-out-alt"></i>
                <form id="logout-form" action="" method="POST" style="display: none;">
                  {{ csrf_field() }}
              </form>
              </a>
            </li>
        </ul>
      </div>
  </nav>
</header>
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User Profile-->
        <div class="user-profile">
            <div class="user-pro-body">
                <div class="" style="text-align: center;">
                    <a href="h()->user()->id) }}" class="u-dropdown text-center link hide-menu text-white">
                      {{Auth()->user()->name}}
                    </a>
                </div>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          {{-- @if (Auth()->user()->role == 1) --}}
          <ul id="sidebarnav">
            <li class="nav-small-cap text-white">--- ADMINISTRACIÓN</li>
            <li>
                <a class="waves-effect waves-dark" href="index.html"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
            </li>
            <li>
                <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Gestion de Tiendas</span></a>
                <ul aria-expanded="false" class="collapse">
                    <li><a href="{{ route('typeStore') }}">Tipo de Tiendas</a></li>
                    <li><a href="{{ route('stores') }}">Tiendas</a></li>
                </ul>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="{{route('categories')}}"><i class="icon-speedometer"></i><span class="hide-menu">Gestion de Categorias</span></a>
            </li>
            <li>
            <a class="waves-effect waves-dark" href="{{route('products')}}"><i class="icon-speedometer"></i><span class="hide-menu">Gestion de Productos</span></a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="{{route('distritos')}}"><i class="icon-speedometer"></i><span class="hide-menu">Gestion de Distritos</span></a>
            </li>
            <li>
                <a class="waves-effect waves-dark" href="index.html"><i class="icon-speedometer"></i><span class="hide-menu">Gestion de Recetas</span></a>
            </li>
         </ul>
         {{-- @else
           <ul id="sidebarnav">
            <li class="nav-small-cap text-white">--- ADMINISTRACIÓN</li>
            <li>
              <a class="waves-effect waves-dark" href=""><i id="icon-nav" class="fas fa-home"></i><span class="hide-menu txtMenu">Inicio</span></a>
            </li>
            <li>
              <a class="waves-effect waves-dark" href=""><i id="icon-nav" class="fas fa-user-graduate"></i><span class="hide-menu txtMenu">Gestion de Clientes</span></a>
            </li>
           </ul>
         @endif --}}
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
