<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Presentable</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="/css/font-awesome.min.css" rel="stylesheet">
    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="/css/global.css" rel="stylesheet">
    @yield('extra-css')
  </head>

  <body class="@yield('body-class')">
    @section('navbar')
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="..">Presentable.</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <!-- <li><a href="#contact">Contact</a></li> -->
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    @show

    <div class="container">
      @yield('content')
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/js/jquery.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script src="/js/global.js"></script>
    @yield('extra-js')
  </body>
</html>
