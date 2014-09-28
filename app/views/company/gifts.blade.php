@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-custom">
	      <div class="panel-heading">
      		<div class="row">
	      		<div class="col-md-6">
		      		<input type="text" class="form-control" placeholder="Naziv poklona" required="" autofocus="">
		      	</div>
		      	<div class="col-md-3">
		      		<input type="text" class="form-control" placeholder="Cena u QRL kodovima" required="" autofocus="">
		      	</div>
		      	<div class="col-md-3">
		      		<button class="btn btn-lg btn-primary btn-block" style="line-height:13px;" type="submit">Dodaj</button>
		      	</div>
	      	</div>
	      </div>
			<div class="panel-body">
			    <div class="list-group" id="codes">
			        <a href="#" class="list-group-item">
			        	<div class="list-group-item-image">
			        		<span class="glyphicon glyphicon-gift"></span>
			           </div>
			            <h4 class="list-group-item-heading"> 2 litra kokakole </h4>
			            <p class="list-group-item-text">Cena: 12 (QRL bodova)</p>
			            <p class="list-group-item-text">Status: <span class="label label-success">Activan</span></p>
			        </a>
			        <a href="#" class="list-group-item">
			        	<div class="list-group-item-image">
			        		<span class="glyphicon glyphicon-gift"></span>
			           </div>
			            <h4 class="list-group-item-heading"> 2 litra kokakole </h4>
			            <p class="list-group-item-text">Cena: 12 (QRL bodova)</p>
			            <p class="list-group-item-text">Status: <span class="label label-success">Activan</span></p>
			        </a>
			        <a href="#" class="list-group-item">
			        	<div class="list-group-item-image">
			        		<span class="glyphicon glyphicon-gift"></span>
			           </div>
			            <h4 class="list-group-item-heading"> 2 litra kokakole </h4>
			            <p class="list-group-item-text">Cena: 12 (QRL bodova)</p>
			            <p class="list-group-item-text">Status: <span class="label label-success">Activan</span></p>
			        </a>
			    </div>
			</div>
		</div>
	</div>
@stop