@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-custom">
	      <div class="panel-heading">
	      <div class="row">
	      	<div class="col-md-5">
				<select class="form-control">
					<option>Sve</option>
					<option>Coffee dream</option>
					<option>Costa</option>
				</select>	
	      	</div>
	      	<div class="col-md-1 number-of-codes">12</div>
	      	<div class="col-md-6">
				<div class="btn-group btn-group-justified">
					<a class="btn btn-info" role="button">Svi </a>
					<a class="btn btn-default" role="button">Aktivni </a>
					<a class="btn btn-default" role="button">Iskorišćeni </a>
				</div>	        		
	      	</div>
	      </div>

	      </div>
			<div class="panel-body">
			    <div class="list-group" id="codes">
			        <a href="#" class="list-group-item">
			        	<div class="list-group-item-image">
			        		<img data-src="holder.js/140x140" class="img-thumbnail" alt="140x140" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+" style="width: 64px; height: 64px;">
			           </div>
			            <h4 class="list-group-item-heading">Company: Coffee dream</h4>
			            <p class="list-group-item-text">Created: 20.12.2014</p>
			            <p class="list-group-item-text">Status: <span class="label label-success">Activan</span></p>
			        </a>
			        <a href="#" class="list-group-item">
			        	<div class="list-group-item-image">
			        		<img data-src="holder.js/140x140" class="img-thumbnail" alt="140x140" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+" style="width: 64px; height: 64px;">
			           </div>
			            <h4 class="list-group-item-heading">Company: Coffee dream</h4>
			            <p class="list-group-item-text">Created: 20.12.2014</p>
			            <p class="list-group-item-text">Status: <span class="label label-danger">Iskorišćen</span></p>
			        </a>
			        <a href="#" class="list-group-item">
			        	<div class="list-group-item-image">
			        		<img data-src="holder.js/140x140" class="img-thumbnail" alt="140x140" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNDAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9IjcwIiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE0MHgxNDA8L3RleHQ+PC9zdmc+" style="width: 64px; height: 64px;">
			           </div>
			            <h4 class="list-group-item-heading">Company: Coffee dream</h4>
			            <p class="list-group-item-text">Created: 20.12.2014</p>
			            <p class="list-group-item-text">Status: <span class="label label-success">Activan</span></p>
			        </a>
			    </div>
			</div>
		</div>
	</div>
@stop