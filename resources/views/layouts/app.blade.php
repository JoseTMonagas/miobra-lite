<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <v-app>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" href="{{ route("home") }}">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="maestroDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <v-icon class="pr-2">mdi-dns</v-icon>Maestro
                            </a>
                            <div class="dropdown-menu" aria-labelledby="maestroDropdown">
                                <a class="dropdown-item" href="{{ route('empresa.show') }}">
                                    <v-icon class="pr-2">mdi-store</v-icon> Empresa
                                </a>
                                <a class="dropdown-item" href="#">
                                    <v-icon class="pr-2">mdi-account-supervisor</v-icon> Usuarios
                                </a>
                                <a class="dropdown-item" href="{{ route('productos.index') }}">
                                    <v-icon class="pr-2">mdi-widgets</v-icon> Productos
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('estados-obra.index') }}">
                                    <v-icon class="pr-2">mdi-playlist-check</v-icon> Estados de Obra
                                </a>
                                <a class="dropdown-item" href="{{ route('controles-pago.index') }}">
                                    <v-icon class="pr-2">mdi-transcribe</v-icon> Controles de Pago
                                </a>
                                <a class="dropdown-item" href="{{ route('tipos-cuenta.index') }}">
                                    <v-icon class="pr-2">mdi-file-tree</v-icon> Tipos de Cuenta
                                </a>
                                <a class="dropdown-item" href="{{ route('medios-pago.index') }}">
                                    <v-icon class="pr-2">mdi-router</v-icon> Medios de Pago
                                </a>
                                <a class="dropdown-item" href="{{ route('bancos.index') }}">
                                    <v-icon class="pr-2">mdi-bank</v-icon> Bancos
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="ventaDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <v-icon class="pr-2">mdi-point-of-sale</v-icon>Venta
                            </a>
                            <div class="dropdown-menu" aria-labelledby="ventaDropdown">
                                <a class="dropdown-item" href="{{ route('clientes.index') }}">
                                    <v-icon class="pr-2">mdi-account-group</v-icon> Clientes
                                </a>
                                <a class="dropdown-item" href="{{ route('cuentas.index') }}">
                                    <v-icon class="pr-2">mdi-clipboard-list-outline</v-icon> Cuentas
                                </a>
                                <a class="dropdown-item" href="{{ route('obras.index') }}">
                                    <v-icon class="pr-2">mdi-account-hard-hat</v-icon> Obras
                                </a>
                                <a class="dropdown-item" href="{{ route('presupuestos.index') }}">
                                    <v-icon class="pr-2">mdi-finance</v-icon> Presupuestos
                                </a>
                                <a class="dropdown-item" href="{{ route('pagos.index') }}">
                                    <v-icon class="pr-2">
                                        mdi-account-cash</v-icon> Estados de Pago
                                </a>
                                <a class="dropdown-item" href="{{ route('facturas.create') }}">
                                    <v-icon class="pr-2">mdi-receipt</v-icon> Facturar
                                </a>
                                <a class="dropdown-item" href="">
                                    <v-icon class="pr-2">mdi-chart-box</v-icon> Reportes
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="adquisicionDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <v-icon class="pr-2">mdi-cart-arrow-down</v-icon> Adquisiciones
                            </a>
                            <div class="dropdown-menu" aria-labelledby="adquisicionDropdown">
                                <a class="dropdown-item" href="{{ route('proveedores.index') }}">
                                    <v-icon class="pr-2">mdi-office-building</v-icon> Proveedores
                                </a>
                                <a class="dropdown-item" href="{{ route('ordenes-compra.index') }}">
                                    <v-icon class="pr-2">mdi-newspaper-variant</v-icon> Ordenes de Compra
                                </a>
                                <a class="dropdown-item" href="#">
                                    <v-icon class="pr-2">mdi-cash-refund</v-icon> Compras
                                </a>
                                </a>
                                <a class="dropdown-item" href="">
                                    <v-icon class="pr-2">mdi-chart-box</v-icon> Reportes
                                </a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="tesoreriaDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <v-icon class="pr-2">mdi-cash-register</v-icon> Tesoreria
                            </a>
                            <div class="dropdown-menu" aria-labelledby="tesoreriaDropdown">
                                <a class="dropdown-item" href="{{ route('cobranzas.index') }}">
                                    <v-icon class="pr-2">mdi-cash-check</v-icon> Cobranza
                                </a>
                                </a>
                                <a class="dropdown-item" href="">
                                    <v-icon class="pr-2">mdi-chart-box</v-icon> Reportes
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">
                @yield('content')
            </div>
            <footer class="row align-items-center border border-top mt-5" >
                <div class="col-md-2">
                    <img class="img-fluid"alt="" src="{{ asset("img/mline.png") }}"/>
                </div>
                <div class="col-md-4 offset-md-2">
                    Sistema MiObra MLine. Todos los derechos reservados. {{ date("Y") }}
                </div>
            </footer>
        </v-app>
    </div>
</body>

</html>
