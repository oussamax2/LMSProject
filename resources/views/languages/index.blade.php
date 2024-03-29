@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('front.Languages')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card-details card">
                         <div class="card-header">
                             <i class="icon icon-globe"></i>
                             @lang('front.Languages')
                             <a class="pull-right" href="{{ route('languages.create') }}"><i class="icon icon-plus"></i></a>
                         </div>
                         <div class="card-body">
                             @include('languages.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

