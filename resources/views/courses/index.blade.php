@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Courses</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-12">
                     <div class="card">
                         <div class="card-header">
                             <i class="icon icon-docs"></i>
                             courses
                             <a class="pull-right" href="{{ route('courses.create') }}"><span class="icon icon-plus"></span>Create courses</a>
                             <a class="pull-right" href="{{ route('courses.import') }}"><span class="icon icon-social-dropbox"></span>Import courses</a>
                         </div>
                         <div class="card-body">
                             @include('courses.table')
                              <div class="pull-right mr-3">

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

