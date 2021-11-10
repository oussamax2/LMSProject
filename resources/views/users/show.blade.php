@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('users.index') }}">@lang('front.User')</a>
            </li>
            <li class="breadcrumb-item active">@lang('front.Details')</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-10 col-lg-offset-10 mx-auto">
                         <div class="card-details card">
                             <div class="card-header">
                             <i class="icon icon-arrow-right-circle"></i>
                                 <strong>@lang('front.Details')</strong>
                                  <a href="{{URL::previous()}}" class="btn btn-light"><span class="icon icon-arrow-right-circle"></span>@lang('front.Back')</a>
                             </div>
                             <div class="card-body">
                                 @include('users.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
