<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>QRLoyalty</title>
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/cover.css') }}
    {{ HTML::style('css/bootstrap-overrides.css') }}
  </head>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
      		<div class="masthead clearfix">
      			<div class="inner">
      			  <h3 class="masthead-brand"><a href="{{URL::to('/company/home')}}">QRLoyalty</a></h3>
      			  <ul class="nav masthead-nav">
      			    <li ><a href="{{URL::to('/company/home')}}">Coffe dream</a></li>
                <li ><a href="{{URL::to('/logout')}}"><span class="glyphicon glyphicon-off"></span></a></li>
      			  </ul>
      			</div>
            <div class="inner">
              <ul id="sub-navigation" class="nav nav-tabs nav-justified" role="tablist">
                <li class="active"><a href="{{URL::to('/company/home')}}">Posalji kod</a></li>
                <li><a href="{{URL::to('/company/codes')}}">Kodovi</a></li>
                <li><a href="{{URL::to('/company/gifts')}}">Katalog poklona</a></li>
              </ul>
            </div>
      		</div>
          @yield('content')
          <div class="mastfoot">
            <div class="inner">
              <p>Marko Nikolic</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    {{ HTML::script('js/libs/jquery.min.js') }}
    {{ HTML::script('js/libs/bootstrap.min.js') }}
  </body>
</html>
