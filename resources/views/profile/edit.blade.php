
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
         
             {!! Form::model($user, ['route' => ['updatesettingsprofile', $user->companies->user_id], 'method' => 'patch', 'files' => true, 'enctype' => 'multipart/form-data']) !!}

                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 formseditprolms">
                        <div class="form-group has-feedback">
                            <label>Cancel period</label>
                            <input type="number" class="form-control" name="cancelpd" value="{{ $user->companies->cancelpd }}" placeholder="0">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>

                        </div> 
                    </div> 
                    <div class="col-lg-6 col-md-12 col-sm-12 formseditprolms">
                        <div class="form-group has-feedback">
                            <label>Canceltrm</label>
                            <input type="text" class="form-control" name="canceltrm" value="{{ $user->companies->canceltrm }}" placeholder="type your canceltrm">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>

                        </div> 
                    </div> 
                    <div class="col-lg-6 col-md-12 col-sm-12 formseditprolms">
                        <div class="form-group has-feedback">
                        
                            <label>Paymenttrm</label>
                            <input type="text" class="form-control" name="paymenttrm" value="{{ $user->companies->paymenttrm }}" placeholder="type your paymenttrm">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>

                        </div> 
                    </div> 
                    <div class="col-lg-6 col-md-12 col-sm-12 formseditprolms">
                        <div class="form-group has-feedback">
                            <label>Generaltrm</label>
                            <input type="text" class="form-control" name="generaltrm" value="{{ $user->companies->generaltrm }}" placeholder="type your generaltrm">
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                
                        </div> 
                    </div> 
                   
                        <div class="col-lg-6 col-lg-offset-6 mx-auto">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">@lang('admin.Update')</button>
                        </div>
                 
                    
                </div>   

            {!! Form::close() !!}

        </div>
      </div>


   </div>
@endsection
