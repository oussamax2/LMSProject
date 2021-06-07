@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('courses.index') !!}">@lang('front.Courses')</a>
          </li>
          <li class="breadcrumb-item active">@lang('front.Edit')</li>
        </ol>
        @include('flash::message')
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-10 col-lg-offset-10 mx-auto">
                      <div class="card">
                          <div class="card-header">
                              <span class="icon icon-note"></span>
                              <strong>@lang('front.Edit Courses')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($courses, ['route' => ['courses.update', $courses->id], 'method' => 'patch']) !!}

                              @include('courses.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection