@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('subcategories.index') !!}">@lang('front.Subcategories')</a>
          </li>
          <li class="breadcrumb-item active">@lang('front.Edit')</li>
        </ol>
        @include('flash::message')
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="icon icon-note"></i>
                              <strong>@lang('front.Edit Subcategories')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($subcategorie, ['route' => ['subcategories.update', $subcategorie->id], 'method' => 'patch']) !!}

                              @include('subcategories.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection