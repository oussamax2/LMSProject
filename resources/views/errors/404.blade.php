@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')
<div class="theme-modal-box loginmodal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h3 class="title-error-lms">404 !!</h3>
                <p class="desc-error-lms">@lang('front.Required was not found')</p>
                <div class="img-error">
                <img class="img-error-lms" src="{{ asset('images/errors/1.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.front.footer')
@endsection