@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-custom" id="generateCodeForm">
	      <div class="panel-heading">
	        <h3 class="panel-title">Pošalji kod</h3>
	      </div>
			<div class="panel-body">
				<form class="form-signin" role="form">
			    <input type="email" class="form-control" placeholder="Email adresa" required="" autofocus="" data-bind="value: email">
			    <br/>
			    <input type="text" class="form-control" placeholder="Ime korisnika (Opciono)" data-bind="value: fullName">
			    <br/>
			    <div class="loading-wrap" data-bind="visible: ajaxInProgress">{{ HTML::image("images/gif-load.gif", "loading") }} Učitavanje u toku...</div>
			    <button class="btn btn-lg btn-primary btn-block" type="submit" data-bind="click: sendCode, enable: canSend, visible: ajaxInProgress() == false">Pošalji</button>
			  </form>
			</div>
		</div>
	</div>
	<script> var SERVER_PATH_LOYALTY_CODE_CREATE = "{{URL::route(Routes::LOYALTY_CODE_CREATE)}}"; </script>
	 {{ HTML::script('js/pages/company/generateLoyaltyCode.js') }}
@stop