@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('courses.index') !!}">Courses</a>
      </li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
            @include('flash::message')
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-10 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <i class="icon-plus"></i>
                                <strong>import Courses</strong>
                            </div>
                            <div class="card-body">
                                <a class="btn btn-ghost-info" href="{{ asset('assets-panel/course.xlsx')}}"><i class="fa fa-file-excel-o" style="font-size:24px"></i> Get exel model </a>
                                <br>
                                <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ route('importExcel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="file" name="import_file" />
                                    <button class="btn btn-primary">Import File</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
