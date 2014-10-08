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
					      <input type="text" class="form-control" placeholder="Unesite ime i prezime" data-bind="value: fullName">
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
					Programi lojalnosti prošli su dug put od papirića na koje su se udarali pečati nakon svake kupovine, preko discount kartica koje su služile za ostvarivanje unapred određenih popusta, da bi se danas zahvaljujući razvoju tehnologije došlo do znatno naprednijih rešenja koja nude mnogo više kako kompaniji koja program organizuje tako i njihovim potrošačima.
				</div>
			</div>
	    </div>
	</div>
	<script> var SERVER_PATH_LOGIN = "{{URL::route(Routes::LOGIN)}}";</script>
	<script> var SERVER_VALUE_ROLE = "{{Roles::CUSTOMER}}";</script>	
	<script> var SERVER_PATH_REGISTRATION = "{{URL::route(Routes::REGISTRATION)}}";</script>
	{{ HTML::script('js/pages/front/registration.js') }}
@stop