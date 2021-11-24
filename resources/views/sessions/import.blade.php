@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('sessions.index') !!}">@lang('front.Sessions')</a>
      </li>
      <li class="breadcrumb-item active">@lang('front.Create')</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
            @include('flash::message')
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-10 mx-auto">
                        <div class="card-details card">
                            <div class="card-header">
                                <i class="icon-plus"></i>
                                <strong>Import sessions</strong>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-ghost-info" href="{{ asset('assets-panel/sessions.xlsx')}}"><i class="fa fa-file-excel-o" style="font-size:24px"></i>@lang('front.Get exel model')</a>
                                <br>
                                <form style="margin-top: 15px; padding: 10px;" action="{{ route('importsessionsExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="file" name="import_file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"/>
                                    <button class="btn btn-primary" style="background: #f36824; border:none;">@lang('front.Import File')</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
