@extends('layouts.app')
@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('registerationsuser.index') }}">@lang('forms.Registerations')</a>
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
                                <i class="icon-info"></i>
                                <strong style="margin-right:30px;">Details</strong>

                                <div class="arrow-steps clearfix pull-right">
                                   @if($registerations->status == 0)
                                        <div class="step current"> <span>New</span> </div>
                                        <div class="step"> <span>Rejected</span> </div>
                                        <div class="step"> <span>pending-payment</span> </div>
                                        <div class="step"> <span>Confirmed</span> </div>
                                   @elseif($registerations->status == 1)
                                        <div class="step"> <span>New</span> </div>
                                        <div class="step current"> <span>Rejected</span> </div>
                                        <div class="step"> <span>pending-payment</span> </div>
                                        <div class="step"> <span>Confirmed</span> </div>
                                   @elseif($registerations->status == 2)
                                        <div class="step"> <span>New</span> </div>
                                        <div class="step"> <span>Rejected</span> </div>
                                        <div class="step current"> <span>pending-payment</span> </div>
                                        <div class="step"> <span>Confirmed</span> </div>
                                   @else
                                        <div class="step"> <span>New</span> </div>
                                        <div class="step"> <span>Rejected</span> </div>
                                        <div class="step"> <span>pending-payment</span> </div>
                                        <div class="step current"> <span>Confirmed</span> </div>
                                   @endif
                                </div>
                            </div>
                            <div class="card-body">
                                 @include('registerationsuser.show_fields')
                            </div>
                        </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
