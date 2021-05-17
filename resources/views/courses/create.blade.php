@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('courses.index') !!}">Courses</a>
      </li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-10 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <i class="icon-plus"></i>
                                <strong>Create Courses</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'courses.store']) !!}

                                   @include('courses.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
