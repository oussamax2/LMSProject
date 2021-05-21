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
                         <div class="card">
                             <div class="card-header">
                                 <strong>Details</strong>
                                  <a href="{{ route('registerations.index') }}" class="btn btn-light">@lang('forms.Back')</a>
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
