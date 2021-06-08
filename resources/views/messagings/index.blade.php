@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('front.Messagings')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card-details card">
                         <div class="card-header">
                             <i class="icon icon-bubbles"></i>
                             @lang('front.Messagings')
                             <a class="pull-right" href="{{ route('messagings.create') }}"><span class="icon icon-plus"></span></a>
                         </div>
                         <div class="card-body">
                             @include('messagings.table')
                              <div class="pull-right mr-3">                 
        @include('coreui-templates::common.paginate', ['records' => $messagings])

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

