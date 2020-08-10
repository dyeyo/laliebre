<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>LA LIEBRE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7e8f963e2a.js" crossorigin="anonymous"></script>
    <link href="{{ asset('node_modules/morrisjs/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/style.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/misEstilos.css')}}" rel="stylesheet">
    <link href="{{ asset('node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/css/pages/dashboard1.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="skin-default-dark fixed-layout">
@routes
<style>
  .select2{
    width: 100%;
  }
  #btncelular{
    display:none !important;
  }
@media (max-width: 992px) {
  #btncelular {
    display: block !important;
  }
  .btngrande{
    display:none;
  }
  .breadcrumb{margin-top: -22px !important;}
}
</style>
  <div id="main-wrapper">
    @include('layouts.nav')
    <div class="page-wrapper">
      <div class="container-fluid">
        @yield('content')
      </div>
    </div>
</div>

    @include('layouts.fotter')
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="{{ asset ('dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('dist/js/waves.js') }}"></script>
    <script src="{{ asset('dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('node_modules/popper/popper.min.js') }}"></script>
    <script src="{{ asset('node_modules/flot/jquery.flot.js') }}"></script>
    <script src="{{ asset('node_modules/flot.tooltip/js/jquery.flot.tooltip.min.js') }}"></script>
    <script src="{{ asset('node_modules/sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="{{ asset('node_modules/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('node_modules/sticky-kit-master/dist/sticky-kit.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
    <script src="{{ asset('js/validacion.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('dist/js/custom.min.js') }}"></script>
    <script>
      // This is for the sticky sidebar
      $(".stickyside").stick_in_parent({
          offset_top: 100
      });
      $('.stickyside a').click(function() {
          $('html, body').animate({
              scrollTop: $($(this).attr('href')).offset().top - 100
          }, 500);
          return false;
      });
      var lastId,
      topMenu = $(".stickyside"),
      topMenuHeight = topMenu.outerHeight(),
      // All list items
      menuItems = topMenu.find("a"),
      // Anchors corresponding to menu items
      scrollItems = menuItems.map(function() {
          var item = $($(this).attr("href"));
          if (item.length) {
              return item;
          }
      });
    </script>
    <script type="text/javascript">
    $(document).ready(function() {
      $('.select2').select2({
        allowClear: true,
        placeholder: "Seleccione una opcion.."
      });
      $('.table').DataTable({ language:
        {
          sProcessing: "Procesando...",
          sLengthMenu: "Mostrar _MENU_ registros",
          sZeroRecords: "No se encontraron resultados",
          sEmptyTable: "Ningún dato disponible en esta tabla",
          sInfo:
            "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
          sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
          sInfoPostFix: "",
          sSearch: "Buscar:",
          sUrl: "",
          sInfoThousands: ",",
          sLoadingRecords: "Cargando...",
          oPaginate: {
            sFirst: "Primero",
            sLast: "Último",
            sNext: "Siguiente",
            sPrevious: "Anterior",
          },
          oAria: {
            sSortAscending:
              ": Activar para ordenar la columna de manera ascendente",
            sSortDescending:
              ": Activar para ordenar la columna de manera descendente",
          },
        }
      });
      let alerta = $(".close").length;
      if (alerta == 1) {
        setTimeout(function () {
          $(".alert-success").fadeOut(1500);
        }, 3000);
      }
    });

  </script>


</body>
</html>
