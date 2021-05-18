<div class="col-xs-6 col-xs-offset-3">
	<div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
	    <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Full Name">
	    <span class="glyphicon glyphicon-user form-control-feedback"></span>

	    @if ($errors->has('name'))
	        <span class="help-block">
	            <strong>{{ $errors->first('name') }}</strong>
	        </span>
	    @endif
	</div>

	<div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
	    <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Email">
	    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

	    @if ($errors->has('email'))
	        <span class="help-block">
	            <strong>{{ $errors->first('email') }}</strong>
	        </span>
	    @endif
	</div>

	<div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
	    <input type="password" class="form-control" name="password" placeholder="Password">
	    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

	    @if ($errors->has('password'))
	        <span class="help-block">
	            <strong>{{ $errors->first('password') }}</strong>
	        </span>
	    @endif
	</div>

	<div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
	    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
	    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

	    @if ($errors->has('password_confirmation'))
	        <span class="help-block">
	            <strong>{{ $errors->first('password_confirmation') }}</strong>
	        </span>
	    @endif
	</div>

	<div class="row">

	    <!-- /.col -->
	    <div class="col-xs-6">
	        <button type="submit" class="btn btn-primary btn-block btn-flat">Update</button>
	    </div>
	    <!-- /.col -->
	</div>
</div>

{{ url('/password/reset') }}
