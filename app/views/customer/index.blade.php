@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-custom">
	      <div class="panel-heading">
	      <div class="row">
	      	<div class="col-md-5">
				<select class="form-control" data-bind="options: companies,
                       optionsText: 'company_name',
                       value: selectedCompany,
                       optionsCaption: 'Select company', event { change: $root.filterByCompany }">
				</select>	
	      	</div>
	      	<div class="col-md-1 number-of-codes" data-bind="text: countLoyaltyCodes()"></div>
	      	<div class="col-md-6">
				<div class="btn-group btn-group-justified" data-bind="foreach: filters">
				 	<a class="btn btn-info" role="button" data-bind="text: key, click: $root.filterByStatus, css: { 'active-filter': value == $root.selectedFilter().value }">Svi kodovi</a>
				</div>        		
	      	</div>
	      </div>

	      </div>
			<div class="panel-body qrl-scroller-panel">
			    <div class="list-group" id="codes" data-bind="foreach: codes">
			        <div class="list-group-item">
			        	<div class="list-group-item-image">
			        		<img class="img-thumbnail" alt="140x140" style="width: 64px; height: 64px;"  data-bind="attr: { src: $root.generatePath(id) }">
			           </div>
			            <h4 class="list-group-item-heading">Company: <b data-bind="text: company.company_name"></b></h4>
			            <p class="list-group-item-text">Created: <i data-bind="text: created_at"></i></p>
			            <p class="list-group-item-text" data-bind="if: (used == 0)"> Status: <span class="label label-success">Aktivan</span></p>
			            <p class="list-group-item-text" data-bind="if: (used == 1)"> Status: <span class="label label-danger">Iskorišćen</span></p>
			        </div>
			    </div>
			</div>
		</div>
	</div>
	 <script> var SERVER_PATH_CODES = "{{URL::to('/codes/')}}"; </script>
	 <script> var SERVER_VALUE_LOYALTY_CODES_JSON = $.parseJSON('{{$codes}}'); </script>
	 <script> var SERVER_VALUE_COMPANIES_JSON = $.parseJSON('{{$companies}}'); </script>
	 {{ HTML::script('js/pages/customer/customerCodes.js') }}
@stop