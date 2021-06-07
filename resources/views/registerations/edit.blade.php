@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('registerations.index') !!}">@lang('front.Registerations')</a>
          </li>
          <li class="breadcrumb-item active">@lang('front.Edit')</li>
        </ol>
        @include('flash::message')
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card-details card">
                          <div class="card-header">
                              <span class="icon icon-note"></span>
                              <strong>@lang('front.Edit Registerations')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($registerations, ['route' => ['registerations.update', $registerations->id], 'method' => 'patch']) !!}

                              @include('registerations.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection