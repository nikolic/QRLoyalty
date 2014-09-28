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
					      <input type="password" class="form-control" placeholder="Unesi sifru" data-bind="value: password">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-12">
					      <input type="password" class="form-control" id="passwordField" placeholder="Ponovi sifru" data-bind="value: passwordConfirmation">
					    </div>
					  </div>
				      <div class="loading-wrap" data-bind="visible: ajaxInProgress">{{ HTML::image("images/gif-load.gif", "loading") }} Please wait...</div>
					  <button type="submit" class="btn btn-lg btn-primary btn-block" data-bind="click: save, visible: ajaxInProgress() == false, enable: canSave">Create User</button>
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
					It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. 
				</div>
			</div>
	    </div>
	</div>
	<script> var SERVER_PATH_LOGIN = "{{URL::route(Routes::LOGIN)}}";</script>
	<script> var SERVER_VALUE_ROLE = "{{Roles::CUSTOMER}}";</script>	
	<script> var SERVER_PATH_REGISTRATION = "{{URL::route(Routes::REGISTRATION)}}";</script>
	{{ HTML::script('js/pages/front/registration.js') }}
@stop