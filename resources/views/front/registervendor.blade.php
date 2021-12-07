@extends('layouts.front.app')
@section('title')
Register -  Corseat.com
@endsection
@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="Register -  Corseat.com"/>
    <meta property="og:description" content="Looking for a course NEVER BEEN EASY AS IT IS TODAY"/>
@endsection

@section('content')
@include('layouts.front.registercompany')
@include('layouts.front.footer')
@endsection
