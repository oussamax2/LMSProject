@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('courses.index') }}">@lang('front.Courses')</a>
            </li>
            <li class="breadcrumb-item active">@lang('front.Details')</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-8 col-lg-8-offset mx-auto">
                         <div class="card-details card">
                             <div class="card-header">
                                 <i class="icon icon-info"></i>
                                 <strong>@lang('front.Details')</strong>
                                  <a href="{{ route('courses.index') }}" class="btn btn-light"><span class="icon icon-arrow-right-circle"></span>@lang('front.Back')</a>
                                  <a class="pull-right" href="{{ route('createfromcourseform', $courses->id) }}"><span class="icon icon-plus"></span>@lang('front.Create session')</a>
                                  <a class="pull-right" href="{{ route('courses.edit', $courses->id) }}"><span class="icon icon-note"></span>@lang('front.Edit')</a>
                                  @if($courses->status == 1)
                                  <button class="btn availablebutton pull-right" style="background: #36d64c; color: #fff; border-radius: 3px; text-decoration: none; font-size: 20px; margin: 0 0 0 15px;padding: 6px 10px; border: none; text-transform: uppercase; cursor: default;">@lang('front.Available')</button>
                                  @elseif($courses->status == 0)
                                  <button class="btn closedbutton pull-right" style="background: #d22323; color: #fff; border-radius: 3px; text-decoration: none; font-size: 20px; margin: 0 0 0 15px;padding: 6px 10px; border: none; text-transform: uppercase; cursor: default;">@lang('front.Closed')</button>
                                  @endif
                             </div>
                             <div class="card-body">
                                 @include('courses.show_fields')
                             </div>
                         </div>
                     </div>
                 </div>
          </div>
    </div>
@endsection
