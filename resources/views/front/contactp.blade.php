@extends('layouts.front.app')
@section('title')
Contact -  Corseat.com
@endsection
@section('og')


    <meta name="title" content="Contact - Corseat.com">
    <meta name="description" content="Contact">
    <meta name="medium" content="mult">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="twitter:card" content="summary_large_image">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Contact - {{config('app.name')}}">
    <meta property="og:url" content="{{ request()->url() }}"/>
    <meta property="og:description" content="Contact">
    <meta property="og:image" content="{{ asset('images/logo/logo3.png')}}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{config('app.name')}}">
    <meta property="og:locale" content='{{app()->getLocale()}}'>
    <meta name="twitter:domain" content="{{request()->getHost()}}">
    <meta name="twitter:title" content="Contact - {{config('app.name')}}">
    <meta name="twitter:url" content="{{ request()->url() }}">
    <meta name="twitter:description" content="Contact">
    <meta name="twitter:image" content="{{ asset('images/logo/logo3.png')}}">
    <meta name="twitter:site" content="website">




@endsection

@section('content')
@include('layouts.front.contact')
@include('layouts.front.footer')
@endsection
