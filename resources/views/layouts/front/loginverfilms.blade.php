{{-- login--}}
<div class="theme-modal-box loginverfiy-lms-content">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <form method="post" action="{{ url('/login') }}">
                    @csrf
                    <h3>Login with Site Account</h3>
                    <div class="wrapper">
                        <input id="email" placeholder="@lang('auth.email')" type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <input id="password" placeholder="@lang('auth.password')" type="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }}" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <ul class="clearfix">
                            <li class="float-left">
                                <input type="checkbox" id="remember">
                                <label for="remember">Remember Me</label>
                            </li>
                            <li class="float-right"><a href="{{ url('/password/reset') }}" class="s-color">Lost Your Password?</a></li>
                        </ul>
                        <button class="p-bg-color hvr-trim" type="submit">@lang('auth.sign_in')</button>
                    </div>
                </form>
                <div><a href="{{ route ('registeruser') }}" class="p-color tran3s">Not an account?? Sign Up</a></div>
            </div>
        </div>
    </div>
</div>
{{-- login--}}