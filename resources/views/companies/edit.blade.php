@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('companies.index') !!}">@lang('front.Companies')</a>
          </li>
          <li class="breadcrumb-item active">@lang('front.Edit')</li>
        </ol>
        @include('flash::message')
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-10 col-lg-offset-10 mx-auto">
                      <div class="card-details card">
                          <div class="card-header">
                              <i class="icon icon-note"></i>
                              <strong>@lang('front.Edit Companies')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($companies, ['route' => ['companies.update', $companies->id], 'method' => 'patch', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

                                   @include('companies.fields',['userdetails' => $companies->user])

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection