

@extends('layouts.app')




@section('content')
<div class="row">
    <div class="col-lg-12 card-details card ">
        <div class="   list-field-detalssessions row">
            <div class="col-lg-6">
                <br><br>
            <div class="form-group ">

                <i class="icon flaticon-bookmark"></i>
                {!! Form::label('course_id', __('front.course')) !!}
                    <p>{{$registerations->sessions->courses->title}}</p>
                </div> <div class="form-group ">
                    <i class="icon icon-clock"></i>
    {!! Form::label('start', __('forms.Session Start')) !!}
                        <p>{{Carbon\Carbon::parse($registerations->sessions->start)->isoFormat('llll')}}</p>
                    </div>
            <div class="form-group ">
                <i class="icon flaticon-bookmark"></i>
                    {!! Form::label('price', __('forms.Price')) !!}
                    <p>{{$registerations->sessions->fee}} <strong>USD</strong></p>
                </div>
            </div>
                <div class="col-lg-6">
<script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{$id}}"></script>
<br>
<form action="{{route('getpay',$idreg)}}" class="paymentWidgets" data-brands="VISA MASTER AMEX">

</form>
                </div>
        </div></div></div>

@endsection
