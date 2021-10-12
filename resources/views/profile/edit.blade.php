
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="edittitlep">
        @lang('admin.Editing Profile')
        </h1>

   </section>
   @include('flash::message')
   <div class="container-fluid">
    <nav class="nav nav-tabs">
        <a class="nav-item nav-link active" href="#p1" data-toggle="tab">General info</a>
        <a class="nav-item nav-link" href="#p2" data-toggle="tab">Setting</a>
      </nav>

      <div class="tab-content">
        <div class="tab-pane active" id="p1">  @include('coreui-templates::common.errors')
            <div class="row">
                <div class="col-lg-12">
                    <div class="">
                        {!! Form::model($user, ['route' => ['login-profile.update', $user->id], 'method' => 'patch', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

                             @include('profile.fields')

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane" id="p2">
          **********


        </div>
      </div>


   </div>
@endsection
