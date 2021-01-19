<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="icon" href="{{ asset('img/favicon.ico') }}">
        <title>{{ config('app.name', 'SistemaHotel') }}</title>

        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">

        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

        <!-- Custom fonts for this template -->
        <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{{ asset('dist/css/one-page-wonder.css') }}" rel="stylesheet">

    </head>

    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
            <div class="container">
            <a class="navbar-brand" href="/">SistemaHotel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Inicio</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Regristro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Ingresar</a>
                    </li>
                    @endauth
                </ul>
            </div>
            </div>
        </nav>

        <header class="masthead text-center text-white">
            <div class="masthead-content">
            <div class="container">
                <h1 class="masthead-heading mb-0">Estancia Agradable</h1>
                <h2 class="masthead-subheading mb-0">Y Placentera, Sientase como en casa</h2>
                <a href="#contenido_pagina" class="btn btn-primary btn-xl rounded-pill mt-5">Ver mas</a>
            </div>
            </div>
            <div class="bg-circle-1 bg-circle"></div>
            <div class="bg-circle-2 bg-circle"></div>
            <div class="bg-circle-3 bg-circle"></div>   
            <div class="bg-circle-4 bg-circle"></div>
        </header>

        <div id="contenido_pagina">
            <section>
                <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="{{ asset('img/landing1.jpg') }}" alt="">
                    </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">Atencion Constante</h2>
                        <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
                    </div>
                    </div>
                </div>
                </div>
            </section>

            <section>
                <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="{{ asset('img/landing2.jpg') }}" alt="">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="p-5">
                        <h2 class="display-4">Decoracion Agradable</h2>
                        <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
                    </div>
                    </div>
                </div>
                </div>
            </section>

            <section>
                <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2">
                    <div class="p-5">
                        <img class="img-fluid rounded-circle" src="{{ asset('img/landing3.jpg') }}" alt="">
                    </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                    <div class="p-5">
                        <h2 class="display-4">Camas Comodas</h2>
                        <p style="text-align:justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
                    </div>
                    </div>
                </div>
                </div>
            </section>
        </div>


        <!-- Footer -->
        <footer class="py-5 bg-black">
            <div class="container">
            <p class="m-0 text-center text-white small">Copyright &copy; Jose Panta 2021</p>
            </div>
            <!-- /.container -->
        </footer>

        <!-- jQuery -->
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
    </body>

</html>
