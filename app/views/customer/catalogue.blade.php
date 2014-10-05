@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-custom">
	      <div class="panel-heading">
			<div class="row">
				<div class="col-md-10">
					<select class="form-control" data-bind="options: companies,
	                       optionsText: 'company_name',
	                       value: selectedCompany,
	                       optionsCaption: 'Select company', event { change: $root.filterByCompany }">
					</select>	
				</div>
				<div class="col-md-1 number-of-gifts" data-bind="text: gifts().length"></div>
			</div>
	      </div>
			<div class="panel-body qrl-scroller-panel">
			    <div class="list-group" id="codes" data-bind="foreach: gifts">
			        <div class="list-group-item">
			        	<div class="list-group-item-image">
			        		<span class="glyphicon glyphicon-gift"></span>
			           </div>
			            <h4 class="list-group-item-heading" data-bind="text: name"></h4>
			            <p class="list-group-item-text">Cena: <b data-bind="text: price + ' (' + company.company_name + ' QRL kodova)'"></b></p>
			            <p class="list-group-item-text"><span class="label label-success">Mozete preuzeti poklon</span></p>
			        </div>
			    </div>
			</div>
		</div>
	</div>

	<script> var SERVER_VALUE_GIFTS_JSON = $.parseJSON('{{$gifts}}'); </script>
	<script> var SERVER_VALUE_COMPANIES_JSON = $.parseJSON('{{$companies}}'); </script>
	{{ HTML::script('js/pages/customer/customerGifts.js') }}
@stop