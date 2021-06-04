@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('front.Target Audiances')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card-details card">
                         <div class="card-header">
                            <i class="icon icon-wallet"></i>
                             @lang('front.Target Audiances')
                             <a class="pull-right" href="{{ route('targetAudiances.create') }}"><span class="icon icon-plus"></span>@lang('front.Create Target Audiances')</a>
                         </div>
                         <div class="card-body">
                             @include('target_audiances.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

