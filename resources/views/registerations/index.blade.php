@extends('layouts.app')

@section('content')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">@lang('front.Registerations')</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
             @include('flash::message')
             <div class="row">
                 <div class="col-lg-10 col-lg-offset-10 mx-auto">
                     <div class="card">
                         <div class="card-header">
                             <span class="icon icon-login"></span>
                             @lang('front.Registerations')
                          

                             <a class="pull-right" href="{{ route('clearnotif',[auth()->user()->id]) }}" onclick="event.preventDefault(); document.getElementById('submit-form').submit();">
                                @lang('front.Clear all Notifications')
                            </a>

                            <form id="submit-form" action="{{ route('clearnotif',[auth()->user()->id]) }}" method="POST" class="hidden">
                              {{ csrf_field() }}

                               
                            </form>
                        </div>
                         <div class="card-body">
                             @include('registerations.table')
                              <div class="pull-right mr-3">

                              </div>
                         </div>
                     </div>
                  </div>
             </div>
         </div>
    </div>
@endsection

