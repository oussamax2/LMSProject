@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('registerationsuser.index') !!}">Registerations</a>
          </li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
        @include('flash::message')
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>Edit Registerations</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($registerations, ['route' => ['registerationsuser.update', $registerations->id], 'method' => 'patch']) !!}

                              @include('registerationsuser.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection