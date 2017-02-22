<!DOCTYPE html>
<html lang="it">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">
    
    <title>Gestione Utenti - Meal Manager</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('/admin/bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('/admin/bower_components/metisMenu/dist/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="{{ asset('/admin/dist/css/timeline.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('/admin/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/css/select2.min.css" rel="stylesheet" />

    @yield('head')

</head>

<body>

    <div id="wrapper">

        <div id="page-wrapper">
            @yield('content')
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    @include('admin.partials.footer')
    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> 
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>           
    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('/admin/bower_components/metisMenu/dist/metisMenu.min.js') }}"></script>
    <!-- Custom Theme JavaScript -->
    <script src="{{ asset('/admin/dist/js/sb-admin-2.js') }}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0-rc.2/js/select2.min.js"></script>  
              
    @yield('scripts')

</body>

</html>