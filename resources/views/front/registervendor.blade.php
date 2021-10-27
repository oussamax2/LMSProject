@extends('layouts.front.app')
@section('title')
Register -  Corseat.com
@endsection
@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="{{ config('app.name') }}"/>
    <meta property="og:description" content="{{ config('app.name') }}"/>
@endsection

@section('content')
@include('layouts.front.registercompany')
@include('layouts.front.footer')
@endsection
