@extends('layouts.app')

@section('content')
  <div class="container-fluid">
    @if ($errors->any())
        <br>
        <div class="alert alert-danger p-0">

            <ul>
                <br>
                @foreach ($errors->all() as $error)
                    {{ $error }}<br>
                @endforeach
            </ul>
        </div>
     @endif
        <div class="animated fadeIn">
             <div class="row">

            </div>
        </div>
    </div>
</div>
@endsection
