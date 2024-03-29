@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('tags.index') !!}">@lang('front.Tags')</a>
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
                              <strong>@lang('front.Edit Tags')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($tag, ['route' => ['tags.update', $tag->id], 'method' => 'patch']) !!}

                              @include('tags.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection