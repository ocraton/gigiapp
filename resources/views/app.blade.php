<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Event Loader - @yield('titlepage')</title>

    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


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
    <script src="//code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{ elixir('js/app.js') }}"></script>

    @yield('scripts')

</body>

</html>
