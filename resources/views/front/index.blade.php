@extends('layouts.front.app')
@section('title')
Corseat - Looking for a course
@endsection
@section('og')
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Corseat - Looking for a course"/>
    <meta property="og:description" content="Looking for a course NEVER BEEN EASY AS IT IS TODAY"/>
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
