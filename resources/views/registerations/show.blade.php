@extends('layouts.app')
@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('registerations.index') }}">@lang('forms.Registerations')</a>
            </li>
            <li class="breadcrumb-item active">@lang('forms.Detail')</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card-details card">
                             <div class="card-header">
                                 <div class="pull-left">
                                 <i class="icon-info"></i>
                                <strong style="margin-right:30px;">Details</strong>
                                <div class="arrow-steps clearfix">
                                    <div class="step current"> <span>New</span> </div>
                                    <div class="step"> <span>Rejected</span> </div>
                                    <div class="step"> <span>paid</span> </div>
                                    <div class="step"> <span>Confirmed</span> </div>
                                </div>
                                 </div>
                                 <div class="actionbuttonslmsreg">
                                 <a href="{{ route('registerations.index') }}" class="btn btn-light"><i class="icon icon-arrow-right-circle"></i>@lang('forms.Back')</a>
                                 <a href="#" class="btn btn-light"><i class="icon icon-trash"></i>@lang('forms.Rejected')</a>
                                 <a href="#" class="btn btn-light"><i class="icon icon-check"></i>@lang('forms.Accept')</a>
                                 </div>
                             </div>
                             <div class="card-body">
                                 @include('registerations.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
