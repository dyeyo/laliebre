
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>La Liebre | Inicio de Sesion</title>

    <!-- page css -->
    <link href="{{ asset('dist/css/pages/login-register-lock.css')}}" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('dist/css/style.min.css')}}" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>

<body>
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    @yield('login')
    <script src="{{ asset('node_modules/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('node_modules/popper/popper.min.js')}}"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        }); $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>

</body>

</html>
