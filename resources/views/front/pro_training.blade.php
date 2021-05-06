@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')
@include('layouts.front.banner_pro')
@include('layouts.front.about-prof-tr')
@include('layouts.front.courses')
@include('layouts.front.footer')
@endsection