@extends('layouts.front.app')

@section('og')
    <meta property="og:type" content="home"/>
    <meta property="og:title" content="Corseat - Looking for a course"/>
    <meta property="og:description" content="Looking for a course NEVER BEEN EASY AS IT IS TODAY"/>
@endsection

@section('content')
@include('layouts.front.detailcrse')
@include('layouts.front.footer')
@endsection
