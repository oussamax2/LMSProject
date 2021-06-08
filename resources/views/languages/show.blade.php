@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('languages.index') }}">@lang('front.Languages')</a>
            </li>
            <li class="breadcrumb-item active">@lang('front.Details')</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card-details card">
                             <div class="card-header">
                             <i class="icon icon-info"></i>
                                 <strong>@lang('front.Details')</strong>
                                  <a href="{{ route('languages.index') }}" class="btn btn-light"><span class="icon icon-arrow-right-circle"></span>@lang('front.Back')</a>
                             </div>
                             <div class="card-body">
                                 @include('languages.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
