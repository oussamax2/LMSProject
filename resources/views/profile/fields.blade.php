<div class="row">
	<div class="col-lg-6 col-md-12 col-sm-12 formseditprolms">
		<div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
			<input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="@lang('admin.Full Name')">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>

			@if ($errors->has('name'))
				<span class="help-block">
					<strong>{{ $errors->first('name') }}</strong>
				</span>
			@endif
		</div>
        <div class="row">
		<div class="form-group col-md-8 has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
			<input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="@lang('admin.Email')" readonly>
			<span class="glyphicon glyphicon-envelope form-control-feedback"></span>

			@if ($errors->has('email'))
				<span class="help-block">
					<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
		</div>
    <div class="form-group col-md-4">
        @if($user->email_verified_at)
        <div class="form-control">
            <span class="btn btn btn-ghost-success icon icon-like"></span>Mail verify
            </div>
        @else
        <div class="form-control">
        <span class="btn btn-ghost-danger icon icon-close"></span>Mail no verify
        </div>
        @endif
    </div>
        </div>

		<div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
			<input type="password" class="form-control" name="password" placeholder="@lang('admin.Password')">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>

			@if ($errors->has('password'))
				<span class="help-block">
					<strong>{{ $errors->first('password') }}</strong>
				</span>
			@endif
		</div>

		<div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
			<input type="password" name="password_confirmation" class="form-control" placeholder="@lang('admin.Confirm password')">
			<span class="glyphicon glyphicon-lock form-control-feedback"></span>

			@if ($errors->has('password_confirmation'))
				<span class="help-block">
					<strong>{{ $errors->first('password_confirmation') }}</strong>
				</span>
			@endif
		</div>
		@if(auth()->user()->hasRole('company'))


			<div class="form-group has-feedback{{ $errors->has('website') ? ' has-error' : '' }}">
				<input type="text" class="form-control" name="website" value="{{ $user->companies->website }}" placeholder="@lang('admin.website')">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>

				@if ($errors->has('website'))
					<span class="help-block">
						<strong>{{ $errors->first('website') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group has-feedback{{ $errors->has('telephone') ? ' has-error' : '' }}">
				<input type="text" class="form-control" name="telephone" value="{{ $user->companies->telephone }}" placeholder="@lang('admin.telephone')">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>

				@if ($errors->has('telephone'))
					<span class="help-block">
						<strong>{{ $errors->first('telephone') }}</strong>
					</span>
				@endif
			</div>
	</div>
	<div class="col-lg-6 col-md-6 col-sm-6">


			<div class="form-group has-feedback{{ $errors->has('shortDescription') ? ' has-error' : '' }}">
				<input type="text" class="form-control" name="shortDescription" value="{{ $user->companies->shortDescription }}" placeholder="@lang('admin.shortDescription')">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>

				@if ($errors->has('shortDescription'))
					<span class="help-block">
						<strong>{{ $errors->first('shortDescription') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group has-feedback{{ $errors->has('description') ? ' has-error' : '' }}">
				<input type="text" class="form-control" name="description" value="{{ $user->companies->description }}" placeholder="@lang('admin.description')">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>

				@if ($errors->has('description'))
					<span class="help-block">
						<strong>{{ $errors->first('description') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group has-feedback{{ $errors->has('fcburl') ? ' has-error' : '' }}">
				<input type="text" class="form-control" name="fcburl" value="{{ $user->companies->fcburl }}" placeholder="@lang('admin.fcburl')">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>

				@if ($errors->has('fcburl'))
					<span class="help-block">
						<strong>{{ $errors->first('fcburl') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group has-feedback{{ $errors->has('twitturl') ? ' has-error' : '' }}">
				<input type="text" class="form-control" name="twitturl" value="{{ $user->companies->twitturl }}" placeholder="@lang('admin.twitturl')">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>

				@if ($errors->has('twitturl'))
					<span class="help-block">
						<strong>{{ $errors->first('twitturl') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group has-feedback{{ $errors->has('linkdinurl') ? ' has-error' : '' }}">
				<input type="text" class="form-control" name="linkdinurl" value="{{ $user->companies->linkdinurl }}" placeholder="@lang('admin.linkdinurl')">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>

				@if ($errors->has('linkdinurl'))
					<span class="help-block">
						<strong>{{ $errors->first('linkdinurl') }}</strong>
					</span>
				@endif
			</div>

			<div class="form-group has-feedback{{ $errors->has('dribbleurl') ? ' has-error' : '' }}">
				<input type="text" class="form-control" name="dribbleurl" value="{{ $user->companies->dribbleurl }}" placeholder="@lang('admin.dribbleurl')">
				<span class="glyphicon glyphicon-user form-control-feedback"></span>

				@if ($errors->has('dribbleurl'))
					<span class="help-block">
						<strong>{{ $errors->first('dribbleurl') }}</strong>
					</span>
				@endif
			</div>







	</div>

</div>
   <div class="row">
	   <div class="col-lg-4 col-lg-offset-4 mx-auto">
		    <div class="form-group has-feedback{{ $errors->has('picture') ? ' has-error' : '' }}">

				@push('scripts')
					<script type="text/javascript">
						// imgInp.onchange = evt => {
						// 	const [file] = imgInp.files
						// 	if (file) {
						// 		blah.src = URL.createObjectURL(file)
						// 	}
						// }



					$('#imgInp').ijaboCropTool({
						preview : '.image-previewer',
						setRatio:540/400,
						allowedExtensions: ['jpg', 'jpeg','png'],
						buttonsText:[@json( __('front.Crop') ),@json( __('front.Cancel') )],
						buttonsColor:['#30bf7d','#ee5155', -15],
						processUrl:'{{ route("crop") }}',
						withCSRF:['_token','{{ csrf_token() }}'],
						onSuccess:function(message, element, status){
							location.reload();
						},
						onError:function(message, element, status){

						}
					});


				</script>
				@endpush
				@if(isset($user->companies->picture) && $user->companies['picture'] != NULL)

					<!-- Picture Field -->
					<div class="form-group col-sm-12">
						{!! Form::label('picture', __('admin.Picture:')) !!}

							{!! Form::file('picture', ['id' =>'imgInp']) !!}

							<img class ="image-previewer" id="blah" src="{{ asset("storage/".$user->companies['picture']) }}" style="width: 229px;height: 213px;border-radius: 106px;" />

					</div>

				@else

					<!-- Picture Field -->
					<div class="form-group col-sm-12">
						{!! Form::label('picture', __('admin.Picture:')) !!}

							{!! Form::file('picture', ['id' =>'imgInp']) !!}

							<img id="blah" src="{{ asset("images/no-image.png") }}" style="width: 229px;height: 213px;border-radius: 106px;"/>

					</div>

				@endif




			</div>


			@endif
		</div>
	</div>
	<div class="row buttonupdatep">
		<div class="col-lg-6 col-lg-offset-6 mx-auto">
			<button type="submit" class="btn btn-primary btn-block btn-flat">@lang('admin.Update')</button>
		</div>
    </div>

