@extends('layouts.front.app')
@section('title')
{{ $sessions->courses->title }} -  Corseat.com
@endsection
@section('og')
<meta property="og:type" content="website"/>
<meta property="og:title" content="{{ $sessions->courses->title }}"/>
<meta property="og:description" content="{{$sessions->courses->body}}"/>
@endsection

@section('content')
@include('layouts.front.single_course')
@include('layouts.front.footer')
@endsection
