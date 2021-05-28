@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('subcategories.index') }}">Subcategorie</a>
            </li>
            <li class="breadcrumb-item active">Detail</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-10 col-lg-offset-10 mx-auto">
                         <div class="card-details card">
                             <div class="card-header">
                             <i class="icon-info"></i>
                                 <strong>Details</strong>
                                  <a href="{{ route('subcategories.index') }}" class="btn btn-light"><i class="icon icon-arrow-right-circle"></i>Back</a>
                             </div>
                             <div class="card-body">
                                 @include('subcategories.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
