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
    {{ HTML::script('js/libs/jquery.min.js') }}
    {{ HTML::script('js/libs/bootstrap.min.js') }}
    {{ HTML::script('js/libs/knockout-3.1.0.js') }}
    {{ HTML::script('js/libs/knockout.mapping-latest.js') }}
    {{ HTML::script('js/libs/knockout.validation.js') }}
    {{ HTML::script('js/libs/knockout.custom.validators.js') }}
    {{ HTML::script('js/libs/Localization/sr-SR.js') }}
    
  </head>
  <body>
    <div class="site-wrapper">
      <div class="site-wrapper-inner">
        <div class="cover-container">
      		<div class="masthead clearfix">
      			<div class="inner">
      			  <h3 class="masthead-brand"><a href="{{URL::to('/')}}">QRLoyalty</a></h3>
      			  <ul class="nav masthead-nav">
      			    <li class="{{HtmlHelper::setActive(Routes::LOGIN, 'active-link-homepage')}}"><a href="{{URL::route(Routes::LOGIN)}}">Prijavi se</a></li>
      			    <li class="{{HtmlHelper::setActive(Routes::FOR_CUSTOMERS, 'active-link-homepage')}}"><a href="{{URL::route(Routes::FOR_CUSTOMERS)}}">Za korisnike</a></li>
      			    <li class="{{HtmlHelper::setActive(Routes::FOR_COMPANIES, 'active-link-homepage')}}"><a href="{{URL::route(Routes::FOR_COMPANIES)}}">Za kompanije</a></li>
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
  </body>
</html>
