@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('companies.index') }}">Companies</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-12">
                         <div class="card-details card">
                             <div class="card-header">
                                <i class="icon-info"></i>
                                <strong>Details</strong>
                                <a href="{{ route('companies.index') }}" class="btn btn-light"><i class="icon icon-arrow-right-circle"></i>Back</a>
                                @if($companies->status == 0)
                                <a href="{{ route('verifcompany', [$companies->id, 'accept']) }}" class="btn btn-outline-success" name="acceptcompany" value="accept">@lang('front.Accept request')</a>
                                <a href="{{ route('verifcompany', [$companies->id, 'decline']) }}" class="btn btn-outline-success" name="declinecompany" value="decline">@lang('front.Decline request')</a>
                                @endif
                                <div class="arrow-steps clearfix pull-right">
                                   @if($companies->status == 0)
                                        <div class="step current"> <span>New</span> </div>
                                        <div class="step"> <span>Accept request</span> </div>
                                        <div class="step"> <span>Decline request</span> </div>
                                   @elseif($companies->status == 2)
                                        <div class="step"> <span>New</span> </div>
                                        <div class="step current"> <span>Accept request</span> </div>
                                        <div class="step"> <span>Decline request</span> </div>
                                   @else
                                   <div class="step"> <span>New</span> </div>
                                    <div class="step"> <span>Accept request</span> </div>
                                    <div class="step current"> <span>Decline request</span> </div>
                                   @endif
                                </div>
                             </div>
                             <div class="card-body">
                                 @include('companies.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
