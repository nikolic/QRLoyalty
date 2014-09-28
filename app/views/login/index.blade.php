@extends('layouts.front')

@section('content')
<!--       <div class="inner cover">
			<form class="form-signin" role="form">
		    <h2 class="form-signin-heading">Please sign in</h2>
		    <input type="email" class="form-control" placeholder="Email address" required="" autofocus="">
		    <br/>
		    <input type="password" class="form-control" placeholder="Password" required="">
		    <label class="checkbox">
		      <input type="checkbox" value="remember-me"> Remember me
		    </label>
		    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
		  </form>
      </div> -->

 	    <div class="col-md-6 col-md-offset-3">
			<div class="panel panel-custom">
		      <div class="panel-heading">
		        <h3 class="panel-title">Please sign in</h3>
		      </div>
				<div class="panel-body">
					<form class="form-signin" role="form">
				    <input type="email" class="form-control" placeholder="Email address" required="" autofocus="">
				    <br/>
				    <input type="password" class="form-control" placeholder="Password" required="">
				    <label class="checkbox">
				      <input type="checkbox" value="remember-me"> Remember me
				    </label>
				    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				  </form>
				</div>
			</div>
	    </div>
@stop