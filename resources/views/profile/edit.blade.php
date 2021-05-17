
@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Editing Profile
        </h1>
   </section>
   <div class="container-fluid">
       @include('coreui-templates::common.errors')
       <div class="row">
           <div class="col-lg-12">
               <div class="">
                   {!! Form::model($user, ['route' => ['login-profile.update', $user->id], 'method' => 'patch']) !!}

                        @include('profile.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection