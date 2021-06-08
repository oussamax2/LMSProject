@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
          <li class="breadcrumb-item">
             <a href="{!! route('contacts.index') !!}">@lang('front.Contacts')</a>
          </li>
          <li class="breadcrumb-item active">@lang('front.Edit')</li>
        </ol>
    <div class="container-fluid">
         <div class="animated fadeIn">
             @include('coreui-templates::common.errors')
             <div class="row">
                 <div class="col-lg-10 col-lg-offset-10 mx-auto">
                      <div class="card-details card">
                          <div class="card-header">
                              <i class="icon icon-note"></i>
                              <strong>@lang('front.Edit Contact')</strong>
                          </div>
                          <div class="card-body">
                              {!! Form::model($contact, ['route' => ['contacts.update', $contact->id], 'method' => 'patch']) !!}

                              @include('contacts.fields')

                              {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
         </div>
    </div>
@endsection