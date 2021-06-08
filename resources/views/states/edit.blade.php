@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('states.index') !!}">@lang('front.States')</a>
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
                              <i class="icon icon-note"></i>
                              <strong>@lang('front.Edit States')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($states, ['route' => ['states.update', $states->id], 'method' => 'patch']) !!}

                              @include('states.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection