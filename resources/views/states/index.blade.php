@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('front.States')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-10 col-lg-offset-10 mx-auto">
                     <div class="card-details card">
                         <div class="card-header">
                             <span class="icon icon-layers"></span>
                             @lang('front.States')
                             <a class="pull-right" href="{{ route('states.create') }}"><span class="icon icon-plus"></span>@lang('front.Create States')</a>
                         </div>
                         <div class="card-body">
                             @include('states.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

