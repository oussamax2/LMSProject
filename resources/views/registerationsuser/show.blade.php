@extends('layouts.app')
@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('registerationsuser.index') }}">@lang('forms.Registerations')</a>
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

                                <i class="icon-info"></i>

                                <strong style="margin-right:30px;">@lang('front.Details')</strong>
                                <div class="arrow-steps clearfix pull-right">
                                   @if($registerations->status != 4)
                                        @if(Carbon\Carbon::parse($registerations->sessions->start->subDays($registerations->sessions->companies->cancelpd))->Diff($registerations->sessions->start)->days >0)


                                             <form  action="{{ route('cancelregistrtion')}}" method="POST" enctype="multipart/form-data">
                                                  {{ csrf_field() }}
                                                  <input type="text" hidden name="idr" value="{{$registerations->id}}">
                                                  <button type="submit" class="btn btn-outline-danger" style="transform: translate(-305px, 40px);font-weight: bold;width: 175px;height: 44px;"> @lang('front.Cancel Registeration')</button>
                                             </form>
                                        @endif
                                      
                                   @endif
                                   @if($registerations->status == 0)
                                        <div class="step current"> <span>@lang('front.New')</span> </div>
                                        <div class="step"> <span>@lang('front.Rejected')</span> </div>
                                        <div class="step"> <span>@lang('front.pending-payment')</span> </div>
                                        <div class="step"> <span>@lang('front.Confirmed')</span> </div>
                                        <div class="step"> <span>@lang('front.Pending-cancelled')</span> </div>
                                   @elseif($registerations->status == 1)
                                        <div class="step"> <span>@lang('front.New')</span> </div>
                                        <div class="step reject"> <span>@lang('front.Rejected')</span> </div>
                                        <div class="step"> <span>@lang('front.pending-payment')</span> </div>
                                        <div class="step"> <span>@lang('front.Confirmed')</span> </div>
                                        <div class="step"> <span>@lang('front.Pending-cancelled')</span> </div>
                                   @elseif($registerations->status == 2)
                                        <div class="step"> <span>New</span> </div>
                                        <div class="step"> <span>Rejected</span> </div>
                                        <div class="step pending"> <span>pending-payment</span> </div>
                                        <div class="step"> <span>Confirmed</span> </div>
                                        <div class="step"> <span>@lang('front.Pending-cancelled')</span> </div>
                                   @elseif($registerations->status == 3)
                                        <div class="step"> <span>@lang('front.New')</span> </div>
                                        <div class="step"> <span>@lang('front.Rejected')</span> </div>
                                        <div class="step"> <span>@lang('front.pending-payment')</span> </div>
                                        <div class="step confirm"> <span>@lang('front.Confirmed')</span> </div>
                                        <div class="step"> <span>@lang('front.Pending-cancelled')</span> </div>
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
