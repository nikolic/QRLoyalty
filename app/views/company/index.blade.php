@extends('layouts.master')

@section('content')
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-custom">
	      <div class="panel-heading">
	        <h3 class="panel-title">Pošalji kod</h3>
	      </div>
			<div class="panel-body">
				<form class="form-signin" role="form">
			    <input type="email" class="form-control" placeholder="Email address" required="" autofocus="">
			    <br/>
			    <input type="text" class="form-control" placeholder="Ime korisnika (Opciono)" >
			    <br/>
			    <button class="btn btn-lg btn-primary btn-block" type="submit">Pošalji</button>
			  </form>
			</div>
		</div>
	</div>
@stop