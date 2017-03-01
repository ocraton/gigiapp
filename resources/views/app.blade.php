<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Event Loader - @yield('titlepage')</title>

    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">


    @yield('head')

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.partials.nav')

        <div id="page-wrapper">
        @yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    @include('admin.partials.footer')
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script> 
    <script src="{{ elixir('js/app.js') }}"></script>

    @yield('scripts')

</body>

</html>
