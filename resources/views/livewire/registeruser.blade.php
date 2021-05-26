<div>
    <div class="row">
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
    </div>
    <form enctype="multipart/form-data">

        {{ csrf_field() }}
        <h2>Register Now</h2>
        <p>Create  your account and browse thousand of courses!!</p>
        <div class="form-wrapper">

            <h6>Your Full Name</h6>
            <input type="text" wire:model='name' placeholder="Your Name" value="{{ old('name') }}"  required>
            @if ($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
            <h6>Your EMail</h6>
            <input type="email" wire:model="email" placeholder="sample@gmail.com" value="{{ old('email') }}" required>
            @if ($errors->has('email'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
            <h6>Password</h6>
            <input type="password" wire:model="password" placeholder="password" required>
            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
            <h6>Confirm Password</h6>
            <input type="password" wire:model="password_confirmation"  placeholder="confirm password" required>
            @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif
            <button   class="tran3s hvr-trim" wire:click.prevent="registerUser">SIGN UP NOW!!</button>
            <a class="register-company" href="{{ route ('register_vendor') }}">register as a company</a>
        </div>
    </form>


</div>
