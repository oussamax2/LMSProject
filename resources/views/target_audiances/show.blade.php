@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('targetAudiances.index') }}">@lang('front.Target Audiances')</a>
            </li>
            <li class="breadcrumb-item active">@lang('front.Details')</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card">
                             <div class="card-header">
                                 <strong>@lang('front.Details')</strong>
                                  <a href="{{ route('targetAudiances.index') }}" class="btn btn-light">@lang('front.Back')</a>
                             </div>
                             <div class="card-body">
                                 @include('target_audiances.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
