<div>
    <div class="col-md-12">
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
        <form method="post">
            @csrf
            <h3>Login with Site Account</h3>
            <div class="wrapper">
                <input id="email" placeholder="@lang('auth.email')" type="email" class="form-control {{ $errors->has('email')?'is-invalid':'' }}" wire:model="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <input id="password" placeholder="@lang('auth.password')" type="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }}" wire:model="password" required autocomplete="current-password">

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
                <button class="p-bg-color hvr-trim" wire:click.prevent="login">@lang('auth.sign_in')</button>
            </div>
        </form>
</div>
