@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12">
        <div class="content-mail-verify">
            <div class="logo" style="margin:2rem 0;">
                <a href="/"><a href="{{ route ('home') }}"><img src="{{ asset('images/logo/logo3.png') }}" alt="Logo"></a></a>
            </div>
            <div class="content-info-desc-mailverif">
                <p class="description-mailverify">
                    @lang('front.Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')
                </p>
            </div>
            @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 text-center">
                <p class="description-mailverify">
                @lang('front.A new verification link has been sent to the email address you provided during registration.')
                </p>
            </div>
            @endif
            <div class="content-buttonverify">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <div>
                        <button class="button-veriflmss">
                            @lang('front.Resend Verification Email')
                        </button>
                    </div>
                </form>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="button-veriflmssgr" type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                        @lang('front.Log Out')
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@include('layouts.front.footer')
@endsection
