@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Countries</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-10 col-lg-offset-10 mx-auto">
                     <div class="card">
                         <div class="card-header">
                             <span class="icon icon-globe"></span>
                             countries
                             <a class="pull-right" href="{{ route('countries.create') }}"><span class="icon icon-plus"></span>create countries</a>
                         </div>
                         <div class="card-body">
                             @include('countries.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

