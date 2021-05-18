@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Sessions</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="icon icon-briefcase"></i>
                             sessions
                             <a class="pull-right" href="{{ route('sessions.create') }}"><span class="icon icon-plus"></span>Create session</a>
                         </div>
                         <div class="card-body">
                             @include('sessions.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

