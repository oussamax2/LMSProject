@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
         <a href="{!! route('roles.index') !!}">Role</a>
      </li>
      <li class="breadcrumb-item active">Create</li>
    </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                @include('coreui-templates::common.errors')
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-10 mx-auto">
                        <div class="card">
                            <div class="card-header">
                                <span class="icon-plus"></span>
                                <strong>Create Role</strong>
                            </div>
                            <div class="card-body">
                                {!! Form::open(['route' => 'roles.store']) !!}

                                   @include('roles.fields')

                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
           </div>
    </div>
@endsection
