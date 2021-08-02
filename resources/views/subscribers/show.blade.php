@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('subscribers.index') }}">@lang('front.Subscribers')</a>
            </li>
            <li class="breadcrumb-item active">@lang('admin.Details')</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>@lang('admin.Details')</strong>
                                  <a href="{{ route('subscribers.index') }}" class="btn btn-light">@lang('front.Back')</a>
                             </div>
                             <div class="card-body">
                                 @include('subscribers.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
