@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Registerations</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-10 col-lg-offset-10 mx-auto">
                     <div class="card">
                         <div class="card-header">
                             <span class="icon icon-login"></span>
                             registerations
                             <a class="pull-right" href="{{ route('registerations.create') }}"><span class="icon icon-plus"></span>Create registerations</a>
                         </div>
                         <div class="card-body">
                             @include('registerations.table')
                              <div class="pull-right mr-3">
                                     
                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

