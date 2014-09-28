@extends('layouts.front')

@section('content')
 	    <div class="col-md-6 col-md-offset-3">
			<div class="panel panel-custom">
		      <div class="panel-heading">
		        <h3 class="panel-title">Please sign in</h3>
		      </div>
				<div class="panel-body">
					<form class="form-signin" role="form" method="POST" action="{{URL::to('/do-login')}}">
					    <input type="email" name="email" class="form-control" placeholder="Email address" required="" autofocus="" value="{{$email or ''}}">
					    <br/>
					    <input type="password" name="password" class="form-control" placeholder="Password" required="">
					    <label class="checkbox">
					      <input type="checkbox" value="remember-me"> Remember me
					    </label>
					    <div class="error-msg">{{ $loginFailedMessage or ''}}</div>
					    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				  </form>
				</div>
			</div>
	    </div>
@stop