@extends('layouts.front')

@section('content')
	<div class="row">
	    <div class="col-md-6">
			<div class="panel panel-custom">
		      <div class="panel-heading">
		        <h3 class="panel-title">Registracija</h3>
		      </div>
				<div class="panel-body">
					<form class="form-horizontal" role="form">
					  <div class="form-group">
					    <div class="col-sm-12">
					      <input type="text" class="form-control" placeholder="Unesite ime i prezime">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-12">
					      <input type="email" class="form-control" placeholder="Unesite email adresu">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-12">
					      <input type="password" class="form-control" placeholder="Unesi sifru">
					    </div>
					  </div>
					  <div class="form-group">
					    <div class="col-sm-12">
					      <input type="password" class="form-control" placeholder="Ponovi sifru">
					    </div>
					  </div>

					  <button type="submit" class="btn btn-lg btn-primary btn-block">Create User</button>
					</form>
				</div>
			</div>
	    </div>
	    <div class="col-md-6">
			<div class="panel panel-custom">
		      <div class="panel-heading">
		        <h3 class="panel-title">Info</h3>
		      </div>
				<div class="panel-body">
					It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. 
				</div>
			</div>
	    </div>
	</div>	
@stop