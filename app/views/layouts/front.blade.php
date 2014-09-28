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
    <!-- Bootstrap core CSS -->
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
      			  <h3 class="masthead-brand"><a href="{{URL::to('/')}}">QRLoyalty</a></h3>
      			  <ul class="nav masthead-nav">
      			    <li ><a href="{{URL::to('/login')}}">Sign in</a></li>
      			    <li><a href="{{URL::to('/for-customers')}}">For customers</a></li>
      			    <li><a href="{{URL::to('/for-companies')}}">For companies</a></li>
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
