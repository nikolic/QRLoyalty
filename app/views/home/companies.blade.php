@extends('layouts.front')

@section('content')
	<div class="row">
	    <div class="col-md-6">
			<div class="panel panel-custom">
		      <div class="panel-heading">
		        <h3 class="panel-title">Registracija</h3>
		      </div>
				<div class="panel-body">
					<form class="form-horizontal" role="form">
					  <div class="form-group">
					    <div class="col-sm-12">
					      <input type="text" class="form-control" placeholder="Unesite ime firme" data-bind="value: companyName">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-12">
					      <input type="email" class="form-control" placeholder="Unesite email adresu" data-bind="value: email">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-12">
					      <input type="password" class="form-control" id="passwordField" placeholder="Unesi sifru" data-bind="value: password">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-12">
					      <input type="password" class="form-control" placeholder="Ponovi sifru" data-bind="value: passwordConfirmation">
					    </div>
					  </div>
					  <div class="loading-wrap" data-bind="visible: ajaxInProgress">{{ HTML::image("images/gif-load.gif", "loading") }} Učitavanje u toku...</div>
					  <button type="submit" class="btn btn-lg btn-primary btn-block" data-bind="click: save, visible: ajaxInProgress() == false, enable: canSave">Kreiraj nalog</button>
					</form>
				</div>
			</div>
	    </div>
	    <div class="col-md-6">
			<div class="panel panel-custom">
		      <div class="panel-heading">
		        <h3 class="panel-title">Info</h3>
		      </div>
				<div class="panel-body">
					Bitno je takođe pomenuti da se kroz loyalty program lako mogu promovisati novi proizvodi, a verovatno da nema boljeg i strožijeg sudije od lojalnih potrošača koji vas poznaju u dušu i znaju šta da očekuju od vas. Da li vam trebaju fokus grupe i nasumično izabrani ljudi, mislim da ne uvek. Vaši postojeći kljenti su vam najstrožije sudije, jer oni ljudi koji najviše koriste vaše proizvode imaju najviše prava da vam o vašem proizvodu ponešto i kažu. Potrošač je nemilosrdan, a jednostavno u ljudskoj prirodi je da svaki čovek voli da bude upitan za mišljenje. 
				</div>
			</div>
	    </div>
	</div>	
	<script> var SERVER_VALUE_ROLE = "{{Roles::COMPANY}}";</script>	
	<script> var SERVER_PATH_REGISTRATION = "{{URL::route(Routes::REGISTRATION)}}";</script>
	<script> var SERVER_PATH_LOGIN = "{{URL::route(Routes::LOGIN)}}";</script>
	{{ HTML::script('js/pages/front/registration.js') }}
@stop