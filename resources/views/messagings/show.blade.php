@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('messagings.index') }}">@lang('front.Messagings')</a>
            </li>
            <li class="breadcrumb-item active">@lang('front.Details')</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-10 col-lg-offset-10 mx-auto">
                         <div class="card">
                             <div class="card-header">
                             <i class="icon icon-info"></i>
                                 <strong>@lang('front.Details')</strong>
                                  <a href="{{ route('messagings.index') }}" class="btn btn-light"><span class="icon icon-arrow-right-circle"></span>@lang('front.Back')</a>
                             </div>
                             <div class="card-body">
                                 @include('messagings.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
