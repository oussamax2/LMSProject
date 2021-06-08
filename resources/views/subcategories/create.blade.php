@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('subcategories.index') !!}">@lang('front.Subcategories')</a>
      </li>
      <li class="breadcrumb-item active">@lang('front.Create')</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-10 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <i class="icon-plus"></i>
                                <strong>@lang('front.Create Subcategorie')</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'subcategories.store']) !!}

                                   @include('subcategories.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
