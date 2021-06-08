@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('front.Countries')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-10 col-lg-offset-10 mx-auto">
                     <div class="card-details card">
                         <div class="card-header">
                             <span class="icon icon-globe"></span>
                             @lang('front.Countries')
                             <a class="pull-right" href="{{ route('countries.create') }}"><span class="icon icon-plus"></span>@lang('front.create countries')</a>
                         </div>
                         <div class="card-body">
                             @include('countries.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

