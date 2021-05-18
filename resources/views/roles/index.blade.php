@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Roles</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-10 col-lg-offset-10 mx-auto">
                     <div class="card">
                         <div class="card-header">
                             <span class="icon icon-graduation"></span>
                             Roles
                             <a class="pull-right" href="{{ route('roles.create') }}"><span class="icon icon-plus"></span>Create roles</a>
                         </div>
                         <div class="card-body">
                             @include('roles.table')
                              <div class="pull-right mr-3">
                                     
        @include('coreui-templates::common.paginate', ['records' => $roles])

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

