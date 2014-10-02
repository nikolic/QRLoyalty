@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-custom">
	      <div class="panel-heading">
			<div class="btn-group btn-group-justified" data-bind="foreach: filters">
			 	<a class="btn btn-info" role="button" data-bind="text: key, click: $root.filterByStatus, css: { 'active-filter': value == $root.selectedFilter().value }">Svi kodovi</a>
<!-- 			      <a class="btn btn-info" role="button">Svi kodovi</a>
			      <a class="btn btn-default" role="button">Aktivni kodovi</a>
			      <a class="btn btn-default" role="button">Iskorišćeni kodovi</a> -->
			</div>
	      </div>
			<div class="panel-body qrl-scroller-panel">
			    <div class="list-group" id="codes" data-bind="foreach: codes">
			        <div href="#" class="list-group-item">
			        	<div class="list-group-item-image">
			        		<img class="img-thumbnail" alt="140x140" style="width: 64px; height: 64px;" data-bind="attr: { src: codeImgPath()}">
			           </div>
			            <h4 class="list-group-item-heading" data-bind="text: ownerDetails()"> </h4>
			            <p class="list-group-item-text" data-bind="text: created">Created: 20.12.2014</p>
			            <p class="list-group-item-text" data-bind="if: status"> Status: <span class="label label-success">Aktivan</span></p>
			            <p class="list-group-item-text" data-bind="ifnot: status"> Status: <span class="label label-danger">Iskorišćen</span></p>
			        </div>
			    </div>
			</div>
		</div>
	</div>
	 <script> var SERVER_PATH_CODES = "{{URL::to('/codes/')}}"; </script>
	 {{ HTML::script('js/pages/company/codes.js') }}
@stop