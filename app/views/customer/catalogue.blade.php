@extends('layouts.master')

@section('content')
	<div class="col-md-12">
		<div class="panel panel-custom">
	      <div class="panel-heading">
			<div class="row">
				<div class="col-md-12">
					<select class="form-control">
						<option>Sve</option>
						<option>Coffee dream</option>
						<option>Costa</option>
					</select>	
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
			            <p class="list-group-item-text"><span class="label label-success">Mozete preuzeti poklon</span></p>
			        </a>
			        <a href="#" class="list-group-item">
			        	<div class="list-group-item-image">
			        		<span class="glyphicon glyphicon-gift"></span>
			           </div>
			            <h4 class="list-group-item-heading"> 2 litra kokakole </h4>
			            <p class="list-group-item-text">Cena: 12 (QRL bodova)</p>
			            <p class="list-group-item-text"><span class="label label-default">Nemate dovoljno kodova</span></p>
			        </a>
			        <a href="#" class="list-group-item">
			        	<div class="list-group-item-image">
			        		<span class="glyphicon glyphicon-gift"></span>
			           </div>
			            <h4 class="list-group-item-heading"> 2 litra kokakole </h4>
			            <p class="list-group-item-text">Cena: 12 (QRL bodova)</p>
			            <p class="list-group-item-text"><span class="label label-success">Mozete preuzeti poklon</span></p>
			        </a>
			    </div>
			</div>
		</div>
	</div>
@stop