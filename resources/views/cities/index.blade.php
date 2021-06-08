@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('front.Cities')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-10 col-lg-offset-10 mx-auto">
                     <div class="card-details card">
                         <div class="card-header">
                             <span class="icon icon-drawer"></span>
                             @lang('front.Cities')
                             <a class="pull-right" href="{{ route('cities.create') }}"><span class="icon icon-plus"></span>@lang('front.Create cities')</a>
                         </div>
                         <div class="card-body">
                             @include('cities.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

