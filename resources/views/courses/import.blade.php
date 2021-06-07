@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('courses.index') !!}">@lang('front.Courses')</a>
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
                                <strong>@lang('front.Import courses')</strong>
                            </div>
                            <div class="card-body">
                                <form style="margin-top: 15px; padding: 10px;" action="{{ route('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="file" name="import_file" />
                                    <button class="btn btn-primary" style="background: #f36824; border:none;">@lang('front.Import File')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
