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

        @if(!auth()->user()->hasRole('user'))

            @include('layouts.front.analytic') 
        @endif

        @include('layouts.front.latestusrreg')

       

    </div>
</div>
@endsection
