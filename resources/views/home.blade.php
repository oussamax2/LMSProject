@extends('layouts.app')

@section('content')
  <div class="container-fluid">
        <div class="animated fadeIn">
             <div class="row">
                <h3> welcom {{ auth()->user()->hasRole('admin')}} </h3>
            </div>
        </div>
    </div>
</div>
@endsection
