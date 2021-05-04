@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')
@include('layouts.front.bannerhome')
@include('layouts.front.course')
@include('layouts.front.category')
@include('layouts.front.filter')
@include('layouts.front.training-org')
@include('layouts.front.partner')
@include('layouts.front.footer')
@endsection