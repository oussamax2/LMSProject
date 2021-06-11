@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('front.Users')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card-details card">
                         <div class="card-header">
                             <i class="icon icon-user"></i>
                             @lang('front.Users')
                             {{-- <a class="pull-right" href="{{ route('users.create') }}"><span class="icon icon-plus"></span>@lang('front.Create Users')</a> --}}
                         </div>
                         <div class="card-body">
                             @include('users.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

