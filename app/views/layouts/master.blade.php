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
    {{ HTML::style('css/jquery.mCustomScrollbar.css') }}
    {{ HTML::style('css/cover.css') }}
    {{ HTML::style('css/bootstrap-overrides.css') }}
    {{ HTML::script('js/libs/jquery.min.js') }}
    {{ HTML::script('js/libs/bootstrap.min.js') }}
    {{ HTML::script('js/libs/jquery.mCustomScrollbar.concat.min.js') }}
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
          @if (UserManager::isCompany(Auth::id()))
            <div class="inner">
              <h3 class="masthead-brand"><a href="{{URL::route(Routes::COMPANY_HOME)}}">QRLoyalty</a></h3>
              <ul class="nav masthead-nav">
                <li ><a href="{{URL::route(Routes::COMPANY_HOME)}}">{{UserManager::getUserBasic(Auth::id())->company_name}}</a></li>
                <li ><a href="{{URL::route(Routes::LOGOUT)}}"><span class="glyphicon glyphicon-off"></span></a></li>
              </ul>
            </div>
            <div class="inner">
              <ul id="sub-navigation" class="nav nav-tabs nav-justified" role="tablist">
                <li class="{{HtmlHelper::setActive(Routes::COMPANY_HOME)}}"><a href="{{URL::route(Routes::COMPANY_HOME)}}">Posalji kod</a></li>
                <li class="{{HtmlHelper::setActive(Routes::COMPANY_CODES)}}"><a href="{{URL::route(Routes::COMPANY_CODES)}}">Kodovi</a></li>
                <li class="{{HtmlHelper::setActive(Routes::COMPANY_GIFTS)}}"><a href="{{URL::route(Routes::COMPANY_GIFTS)}}">Katalog poklona</a></li>
              </ul>
            </div>  
            @else
              <div class="inner">
                <h3 class="masthead-brand"><a href="{{URL::route(Routes::CUSTOMER_HOME)}}">QRLoyalty</a></h3>
                <ul class="nav masthead-nav">
                  <li ><a href="{{URL::route(Routes::CUSTOMER_ACCOUNT)}}">{{UserManager::getUserBasic(Auth::id())->full_name}}</a></li>
                  <li ><a href="{{URL::route(Routes::LOGOUT)}}"><span class="glyphicon glyphicon-off"></span></a></li>
                </ul>
              </div>
              <div class="inner">
                <ul id="sub-navigation" class="nav nav-tabs nav-justified" role="tablist">
                  <li class="{{HtmlHelper::setActive(Routes::CUSTOMER_HOME)}}"><a href="{{URL::route(Routes::CUSTOMER_HOME)}}">Vasi kodovi (17)</a></li>
                  <li class="{{HtmlHelper::setActive(Routes::CUSTOMER_CATALOGUE)}}"><a href="{{URL::route(Routes::CUSTOMER_CATALOGUE)}}">Katalog</a></li>
                  <li class="{{HtmlHelper::setActive(Routes::CUSTOMER_ACCOUNT)}}"><a href="{{URL::route(Routes::CUSTOMER_ACCOUNT)}}">Moj nalog</a></li>
                </ul>
              </div>  
            @endif
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
