@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-custom">
	      <div class="panel-heading">
	        <h3 class="panel-title">{{$user->full_name}} ({{$user->email}})</h3>
	      </div>
			<div class="panel-body">
			    <div class="list-group" id="codes">
			        <div class="list-group-item">
			            <p class="list-group-item-text">Vlasnik: {{$user->full_name}}</p>
			            <p class="list-group-item-text">Email: {{$user->email}}</p>
			            <p class="list-group-item-text">Kreirano: {{$user->created_at}}</p>
			            <p class="list-group-item-text">Status: <span class="label label-success">Activan</span></p>
			        </div>
			        <div class="list-group-item">
			            <p class="list-group-item-text margin-bottom">
			            	Promeni password
			            </p>
			            <p class="list-group-item-text">
			            	<div class="row">
				            	<div class="col-md-6">
				            		<input type="password" id="passwordField" class="form-control" placeholder="Novi password" data-bind="value: password">
				            	</div>
				            	<div class="col-md-6">
				            		<input type="password" class="form-control" placeholder="Potvrdi novi password" data-bind="value: passwordConfirmation">
				            	</div>
			            	</div>
			            </p>
			            <button type="button" class="btn btn-sm btn-info" data-bind="click: updatePassword, enable: canUpdate, visible: ajaxInProgress() == false">Promeni password</button>
				        <div class="loading-wrap" data-bind="visible: ajaxInProgress">{{ HTML::image("images/gif-load.gif", "loading") }} Učitavanje u toku...</div>
			        </div>
			        <div class="list-group-item">
			            <button type="button" class="btn btn-sm btn-danger">Deaktiviraj nalog</button>
			        </div>
			    </div>
			</div>
		</div>
	</div>
	<script> var SERVER_PATH_CHANGE_PASSWORD = "{{URL::route(Routes::CUSTOMER_ACCOUNT_CHANGE_PASSWORD)}}"; </script>
	{{ HTML::script('js/pages/customer/account.js') }}
@stop