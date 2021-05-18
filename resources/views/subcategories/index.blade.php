@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Subcategories</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-10 col-lg-offset-10 mx-auto">
                     <div class="card">
                         <div class="card-header">
                             <i class="icon icon-wallet"></i>
                             subcategories
                             <a class="pull-right" href="{{ route('subcategories.create') }}"><span class="icon icon-plus"></span>Create subcategories</a>
                         </div>
                         <div class="card-body">
                             @include('subcategories.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

