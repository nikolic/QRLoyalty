@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-custom">
	      <div class="panel-heading">
	        <h3 class="panel-title">Marko Nikolic (nikolic89@hotmail.com)</h3>
	      </div>
			<div class="panel-body">
			    <div class="list-group" id="codes">
			        <div class="list-group-item">
			            <p class="list-group-item-text">Your Name: Marko Nikolic</p>
			            <p class="list-group-item-text">Email: nikolic89@hotmail.com</p>
			            <p class="list-group-item-text">Created: 20.12.2014</p>
			            <p class="list-group-item-text">Status: <span class="label label-success">Activan</span></p>
			        </div>
			        <div class="list-group-item">
			            <p class="list-group-item-text margin-bottom">
			            	Change password
			            </p>
			            <p class="list-group-item-text">
			            	<div class="row">
				            	<div class="col-md-6">
				            		<input type="password" class="form-control" placeholder="New password" required="">
				            	</div>
				            	<div class="col-md-6">
				            		<input type="password" class="form-control" placeholder="New password confirmation" required="">
				            	</div>
			            	</div>
			            </p>
			            <h4 class="list-group-item-text"><span class="label label-info">Change password</span></h4>
			        </div>
			        <div class="list-group-item">
			            <h4 class="list-group-item-heading"><span class="label label-default">Deactivate account</span></h4>
			        </div>
			    </div>
			</div>
		</div>
	</div>
@stop