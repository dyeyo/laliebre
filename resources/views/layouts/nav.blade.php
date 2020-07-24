
<header class="topbar">
  <nav class="navbar top-navbar navbar-expand-md navbar-dark">
      <!-- ============================================================== -->
      <!-- Logo -->
      <!-- ============================================================== -->
      <div class="navbar-header">
          <a class="navbar-brand" href="index.html">
              <!-- Logo icon --><b>
                  <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                  <!-- Dark Logo icon -->
                  <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                  <!-- Light Logo icon -->
                  <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
              </b>
              <!--End Logo icon -->
              <!-- Logo text --><span>
               <!-- dark Logo text -->
               <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" />
               <!-- Light Logo text -->
               <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>
      </div>
      <!-- ============================================================== -->
      <!-- End Logo -->
      <!-- ============================================================== -->
      <div class="navbar-collapse">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav mr-auto">
              <!-- This is  -->
              <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
              <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>

          </ul>
          <!-- ============================================================== -->
          <!-- User profile and search -->
          <!-- ============================================================== -->

      </div>
  </nav>
</header>
<aside class="left-sidebar">
  <!-- Sidebar scroll-->
  <div class="scroll-sidebar">
      <!-- User Profile-->
      <div class="user-profile">
        <div class="user-pro-body">
          <div>
            <img src="../assets/images/users/2.jpg" alt="user-img" class="img-circle">
          </div>
            <a href="javascript:void(0)" class="u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav">
        <ul id="sidebarnav">
          <li class="nav-small-cap text-white">--- ADMINISTRACIÓN</li>
          <li>
              <a class="waves-effect waves-dark" href="/"><i class="fas fa-home"></i><span class="hide-menu">Inicio</span></a>
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
