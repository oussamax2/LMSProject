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
                                <a href="{{ route('companies.index') }}" class="btn btn-light">Back</a>
                                @if($companies->status == 0)
                                <a href="{{ route('verifcompany', [$companies->id, 'accept']) }}" class="btn btn-outline-success" name="acceptcompany" value="accept">@lang('front.Accept request')</a>
                                <a href="{{ route('verifcompany', [$companies->id, 'decline']) }}" class="btn btn-outline-success" name="declinecompany" value="decline">@lang('front.Decline request')</a>
                                @endif
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
