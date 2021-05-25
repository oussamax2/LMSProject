@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')
<div class="theme-modal-box loginmodal">
    <div class="modal-dialog">
        {{-- Modal content --}}
        <div class="modal-content">
            <div class="modal-body">
                <form method="post" action="{{ url('/login') }}">
                    @if ($errors->any())
                    <div class="alert alert-danger p-0">
                        <ul>
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </ul>
                    </div>
                     @endif
                    @csrf
                    <h1 style="text-align:center;">@lang('auth.sign_in')</h1>
                    <h3>Sign in to start your session</h3>
                    <div class="wrapper">
                        <input id="email" placeholder="@lang('auth.email')" type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }}" name="password" placeholder="@lang('auth.password')">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        <ul class="clearfix">
                            <li class="float-left">
                                <input type="checkbox" id="remember" style="height:auto;">
                                <label for="remember">Remember Me</label>
                            </li>
                            <li class="float-right"><a href="{{ url('/password/reset') }}" class="s-color">Lost Your Password?</a></li>
                        </ul>
                        <button class="p-bg-color hvr-trim" type="submit">@lang('auth.sign_in')</button>
                    </div>
                </form>
                <div><a href="{{ url('/registeruser') }}" class="p-color tran3s">Not an account?? Sign Up</a></div>
            </div>
        </div>
    </div>
</div>
@include('layouts.front.footer')
@endsection





