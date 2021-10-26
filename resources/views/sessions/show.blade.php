@extends('layouts.app')

@section('content')
     <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('sessions.index') }}">@lang('front.Sessions')</a>
            </li>
            <li class="breadcrumb-item active">@lang('front.Details')</li>
     </ol>
     <div class="container-fluid">
          <div class="animated fadeIn">
            @include('flash::message')
                 @include('coreui-templates::common.errors')
                 <div class="row">
                     <div class="col-lg-10 col-lg-offset-10 mx-auto">
                         <div class="card-details card">
                             <div class="card-header">
                             <i class="icon icon-info"></i>
                                 <strong>@lang('front.Details')</strong>
                                  <a href="{{ route('sessions.index') }}" class="btn btn-light"><span class="icon icon-arrow-right-circle"></span>@lang('front.Back')</a>
                                  <a class="pull-right" href="{{ route('sessions.edit', $sessions->id) }}"><span class="icon icon-note"></span>@lang('front.Edit')</a>
                                  @if($sessions->status == 1)
                                  <button class="btn availablebutton pull-right" style="background: #36d64c; color: #fff; border-radius: 3px; text-decoration: none; font-size: 20px; margin: 0 0 0 15px;padding: 6px 10px; border: none; text-transform: uppercase;">@lang('front.Available')</button>
                                  @elseif($sessions->status == 0)
                                  <button class="btn closedbutton pull-right" style="background: #d22323; color: #fff; border-radius: 3px; text-decoration: none; font-size: 20px; margin: 0 0 0 15px;padding: 6px 10px; border: none; text-transform: uppercase;">@lang('front.Closed')</button>
                                  @endif
                                  <a class="btn btn-light pull-right" target="_blank" href="{{ route('detailcourse', $sessions->id) }}"><span class="icon icon-eye"></span>@lang('admin.Preview')</a>
                                  @if($sessions->publish == 0)

                                  <a onclick = "return confirm('Are you sure?')" class="btn btn-ghost-success pull-right"  href="{{ route('sessions.publish', $sessions->id) }}"><span class="icon icon-check"></span>@lang('admin.In publish')</a>
                                  @endif
                                </div>
                             <div class="card-body">
                                 @include('sessions.show_fields')
                             </div>
                         </div>
                     </div>
                    </div>
                 </div>

                 <div class="row card-body">
                    <div class="col-lg-10 col-lg-offset-10 mx-auto card-details card">
                        <strong>LOGS</strong>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Action</th>

                                        </tr>
                                    </thead>
                                    <?php $i=1; ?>
                        <?php $i=1; ?>
                        @foreach ($activity as $act)
                        <tbody>
                            <tr>
                                <th scope="row">{{$i++}}</th>
                                <td class="logs">{{App\Models\User::find($act->causer_id)->name}}</td>

                                <td class="logs">
                                   <strong>{{$act->description}}</strong>
                                    <br>
                                   {{$act->properties}}

                                </td>
                            </tr>
                        </tbody>
                    @endforeach
            </table>

                    </div>
                </div>
            </div>

          </div>
    </div>
@endsection
