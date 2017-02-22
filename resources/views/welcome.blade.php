<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="robots" content="noindex">

      <title>Genoma Web Services - @yield('titlepage')</title>

      <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

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
        <div class="container">
            <div class="content">
                <div class="row">
                    <h1>Genoma Web Service</h1>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                Login
                            </div>
                            <div class="panel-body" >
                                <form class="form-horizontal" action="/api/test" method="POST">


                                <!-- Text input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="username">Username</label>
                                  <div class="col-md-4">
                                  <input id="username" name="username" type="text" placeholder="" class="form-control input-md" required="">

                                  </div>
                                </div>

                                <!-- Password input-->
                                <div class="form-group">
                                  <label class="col-md-4 control-label" for="password">Password</label>
                                  <div class="col-md-4">
                                    <input id="password" name="password" type="password" placeholder="" class="form-control input-md" required="">

                                  </div>
                                </div>


                                <div class="form-group">
                                  <div class="col-md-4 col-md-offset-4">
                                    <input type="submit" value="Login" class="btn btn-lg btn-primary">
                                  </div>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
