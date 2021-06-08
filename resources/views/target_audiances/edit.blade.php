@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('targetAudiances.index') !!}">@lang('front.Target Audiance')</a>
          </li>
          <li class="breadcrumb-item active">@lang('front.Edit')</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-12">
                      <div class="card">
                          <div class="card-header">
                              <i class="fa fa-edit fa-lg"></i>
                              <strong>@lang('front.Edit Target Audiance')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($targetAudiance, ['route' => ['targetAudiances.update', $targetAudiance->id], 'method' => 'patch']) !!}

                              @include('target_audiances.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection