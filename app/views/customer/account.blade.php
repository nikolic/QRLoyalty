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
			            <p class="list-group-item-text">Your Name: {{$user->full_name}}</p>
			            <p class="list-group-item-text">Email: {{$user->email}}</p>
			            <p class="list-group-item-text">Created: {{$user->created_at}}</p>
			            <p class="list-group-item-text">Status: <span class="label label-success">Activan</span></p>
			        </div>
			        <div class="list-group-item">
			            <p class="list-group-item-text margin-bottom">
			            	Change password
			            </p>
			            <p class="list-group-item-text">
			            	<div class="row">
				            	<div class="col-md-6">
				            		<input type="password" id="passwordField" class="form-control" placeholder="New password" data-bind="value: password">
				            	</div>
				            	<div class="col-md-6">
				            		<input type="password" class="form-control" placeholder="New password confirmation" data-bind="value: passwordConfirmation">
				            	</div>
			            	</div>
			            </p>
			            <button type="button" class="btn btn-sm btn-info" data-bind="click: updatePassword, enable: canUpdate, visible: ajaxInProgress() == false">Change password</button>
				        <div class="loading-wrap" data-bind="visible: ajaxInProgress">{{ HTML::image("images/gif-load.gif", "loading") }} Please wait...</div>
			        </div>
			        <div class="list-group-item">
			            <button type="button" class="btn btn-sm btn-danger">Deaktivaj nalog</button>
			        </div>
			    </div>
			</div>
		</div>
	</div>
	<script> var SERVER_PATH_CHANGE_PASSWORD = "{{URL::route(Routes::CUSTOMER_ACCOUNT_CHANGE_PASSWORD)}}"; </script>
	{{ HTML::script('js/pages/customer/account.js') }}
@stop