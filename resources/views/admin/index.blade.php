@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('admin.Admins')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-10 col-lg-offset-10 mx-auto">
                     <div class="card-details card">
                         <div class="card-header">
                             <span class="icon icon-graduation"></span>
                             @lang('admin.Admins')
                             <a class="pull-right" href="{{ route('createadmin') }}"><span class="icon icon-plus"></span>@lang('front.Create roles')</a>

                            
                         </div>
                         <div class="card-body">
                             @include('admin.table')
                              <div class="pull-right mr-3">
                                     
                                  @include('coreui-templates::common.paginate', ['records' => $admin])

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

