@extends('layouts.front.app')
@section('title')
{{ $sessions->courses->title }} -  Corseat.com
@endsection
@section('og')
    <meta name="title" content="{{ $sessions->courses->title }} - Corseat.com">
    <meta name="description" content="{!! \Illuminate\Support\Str::limit(strip_tags($sessions->courses->body), 160, $end='...') !!}">
    <meta name="medium" content="mult">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="twitter:card" content="summary_large_image">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="{{ $sessions->courses->title }} - Corseat.com">
    <meta property="og:url" content="{{ request()->url() }}"/>
    <meta property="og:description" content="{!! \Illuminate\Support\Str::limit(strip_tags($sessions->courses->body), 160, $end='...') !!}">
    <meta property="og:image" content="{{ asset("storage/".$sessions->companies->picture) }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{config('app.name')}}">
    <meta property="og:locale" content='{{app()->getLocale()}}'>
    <meta name="twitter:domain" content="{{request()->getHost()}}">
    <meta name="twitter:title" content="{{ $sessions->courses->title }} - {{config('app.name')}}">
    <meta name="twitter:url" content="{{ request()->url() }}">
    <meta name="twitter:description" content="{!! \Illuminate\Support\Str::limit(strip_tags($sessions->courses->body), 160, $end='...') !!}">
    <meta name="twitter:image" content="{{ asset("storage/".$sessions->companies->picture) }}">
    <meta name="twitter:site" content="website">
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Event",
          "name": "{{ $sessions->courses->title }}",
          "startDate": "{{Carbon\Carbon::parse($sessions->start )->format('Y-m-d\TH:i:s')}}",
          "endDate": "{{Carbon\Carbon::parse($sessions->end )->format('Y-m-d\TH:i:s')}}",
          "eventAttendanceMode": "https://schema.org/OfflineEventAttendanceMode",
          "eventStatus": "https://schema.org/EventScheduled",
          "location": {
            "@type": "Place",
            "name": "{{ isset($sessions->states->name) ? $sessions->states->name:'' }},{{ $sessions->countries->name }}",
            "address": {
              "@type": "PostalAddress",
              "addressLocality": "{{ isset($sessions->cities->name) ? $sessions->cities->name:'' }}",
              "addressRegion": "{{ isset($sessions->states->name) ? $sessions->states->name:'' }}",
              "addressCountry": "{{ $sessions->countries->name }}"
            }
          },
          "image": [
            "{{ asset("storage/".$sessions->companies->picture) }}",
            "{{ asset("storage/".$sessions->companies->picture) }}"

           ],
          "description": "{!! \Illuminate\Support\Str::limit(strip_tags($sessions->courses->body), 160, $end='...') !!}",
          "offers": {
            "@type": "Offer",
            "url": "{{ request()->url() }}",
            "price": "{{ $sessions->fee }}",
            "priceCurrency": "USD",
            "availability": "https://schema.org/InStock",
            "validFrom": "{{Carbon\Carbon::parse($sessions->start )->format('Y-m-d\TH:i:s')}}"
          },
          "performer": {
            "@type": "PerformingGroup",
            "name": "{{$sessions->companies->user->name}}"
          },
          "organizer": {
            "@type": "Organization",
            "name": "{{$sessions->companies->user->name}}",
            "url": "https://corseat.com/"
          }
        }
        </script>
@endsection

@section('content')
@include('layouts.front.single_course')
@include('layouts.front.footer')
@endsection
