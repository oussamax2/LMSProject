@extends('layouts.app')
@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('categories.index') !!}">@lang('front.Categories')</a>
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
                                <i class="icon-plus"></i>
                                <strong>@lang('front.Create Categories')</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'categories.store', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

                                   @include('categories.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
