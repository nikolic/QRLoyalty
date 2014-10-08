@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-custom">
	      <div class="panel-heading">
      		<div class="row" data-bind="visible: ajaxInProgress() == false">
	      		<div class="col-md-6">
		      		<input type="text" class="form-control" placeholder="Naziv poklona" data-bind="value: name">
		      	</div>
		      	<div class="col-md-3">
		      		<input type="text" class="form-control" placeholder="Cena u QRL kodovima" data-bind="value: price">
		      	</div>
		      	<div class="col-md-3">
		      		<button class="btn btn-lg btn-primary btn-block" style="line-height:13px;" type="submit" data-bind="click: createGift, enable: isValidNewGift">Dodaj</button>
		      	</div>
	      	</div>
	      	<div class="row" data-bind="visible: ajaxInProgress">
	      		<div class="loading-wrap">{{ HTML::image("images/gif-load.gif", "loading") }} Učitavanje u toku...</div>
	      	</div>
	      </div>
			<div class="panel-body qrl-scroller-panel">
			    <div class="list-group" id="codes" data-bind="foreach: gifts">
			        <div class="list-group-item">
			        	<div class="list-group-item-image">
			        		<span class="glyphicon glyphicon-gift"></span>
			           </div>
			            <h4 class="list-group-item-heading" data-bind="text: name"></h4>
			            <p class="list-group-item-text">Cena: <b data-bind="text: price"></b> (QRL bodova)</p>
			            <p class="list-group-item-text" data-bind="if: active == 1">Status: <span class="label label-success">Aktivan</span></p>
			            <p class="list-group-item-text" data-bind="if: active == 0">Status: <span class="label label-danger">Neaktivan</span></p>
			        </div>
			    </div>
			</div>
		</div>
	</div>
	<script> var SERVER_PATH_GIFT_CREATE = "{{URL::route(Routes::GIFT_CREATE)}}";</script>
	<script> var SERVER_PATH_GIFTS_JSON = $.parseJSON('{{$gifts}}'); </script>
	{{ HTML::script('js/pages/company/gifts.js') }}
@stop