

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
                                <i class="icon icondetails icon-info"></i>
                                <strong class="strongtitlereg">@lang('front.Details')</strong>
                                <a href="{{ route('registerations.index') }}" class="btn btn-light"><span class="icon icon-arrow-right-circle"></span>@lang('forms.Back')</a>

                                 @if(!($registerations->status == 1 || $registerations->status == 3) && $registerations->status == 0)
                                    <a href="{{ route('verifregistrequest', [$registerations->id, 2]) }}" class="btn btn-light buttonecceptuser"><span class="icon icon-check"></span>@lang('forms.Accept')</a>
                                    <a href="{{ route('verifregistrequest', [$registerations->id, 1]) }}" class="btn btn-light buttonrejectuser"><span class="icon icon-trash"></span>@lang('forms.Reject')</a>
                                 @endif
                                 @if(!($registerations->status == 1 || $registerations->status == 3) && $registerations->status == 2)
                                    <a href="{{ route('verifregistrequest', [$registerations->id, 3]) }}" class="btn btn-light buttonecceptuser"><span class="icon icon-check"></span>@lang('forms.Accept')</a>
                                    <a href="{{ route('verifregistrequest', [$registerations->id, 1]) }}" class="btn btn-light buttonrejectuser"><span class="icon icon-trash"></span>@lang('forms.Reject')</a>
                                 @endif
                                 @if( $registerations->status == 4)
                                    <a href="{{ route('verifregistrequest', [$registerations->id, 4]) }}" class="btn btn-light buttonecceptuser"><span class="icon icon-check"></span>@lang('front.Approve')</a>

                                 @endif
                                <div class="arrow-steps clearfix pull-right">
                                   @if($registerations->status == 0)
                                        <div class="step current"> <span>@lang('front.New')</span></div>
                                        <div class="step"> <span>@lang('front.Rejected')</span> </div>
                                        <div class="step"> <span>@lang('front.pending-payment')</span> </div>
                                        <div class="step"> <span>@lang('front.Confirmed')</span> </div>
                                   @elseif($registerations->status == 1)
                                        <div class="step"> <span>@lang('front.New')</span> </div>
                                        <div class="step reject"> <span>@lang('front.Rejected')</span> </div>
                                        <div class="step"> <span>@lang('front.pending-payment')</span> </div>
                                        <div class="step"> <span>@lang('front.Confirmed')</span> </div>
                                   @elseif($registerations->status == 2)
                                        <div class="step"> <span>@lang('front.New')</span> </div>
                                        <div class="step"> <span>@lang('front.Rejected')</span> </div>
                                        <div class="step pending"> <span>@lang('front.pending-payment')</span> </div>
                                        <div class="step"> <span>@lang('front.Confirmed')</span> </div>
                                   @elseif($registerations->status == 3)
                                        <div class="step"> <span>@lang('front.New')</span> </div>
                                        <div class="step"> <span>@lang('front.Rejected')</span> </div>
                                        <div class="step"> <span>@lang('front.pending-payment')</span> </div>
                                        <div class="step confirm"> <span>@lang('front.Confirmed')</span> </div>
                                   @elseif($registerations->status == 4)
                                        <div class="step"> <span>@lang('front.New')</span> </div>
                                        <div class="step"> <span>@lang('front.Rejected')</span> </div>
                                        <div class="step"> <span>@lang('front.pending-payment')</span> </div>
                                        <div class="step"> <span>@lang('front.Confirmed')</span> </div>
                                        <div class="step pending"> <span>@lang('front.Pending-cancelled')</span> </div>

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

