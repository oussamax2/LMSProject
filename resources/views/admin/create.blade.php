@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('indexadmins') !!}">@lang('front.User')</a>
      </li>
      <li class="breadcrumb-item active">@lang('front.Create')</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-10 mx-auto">
                        <div class="card-details card">
                            <div class="card-header">
                                <i class="icon icon-plus"></i>
                                <strong>@lang('front.Create Users')</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'storeadmin']) !!}

                                   @include('admin.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
