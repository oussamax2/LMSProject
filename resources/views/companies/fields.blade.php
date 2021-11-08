<!-- get user information from users table Firstname,email -->

<!-- Firstname Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', __('forms.name')) !!}
    {!! Form::text('name', isset($userdetails->name) ?$userdetails->name: null, ['class' => 'form-control', 'required']) !!}
</div>
<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', __('forms.Email')) !!}
    {!! Form::text('email', isset($userdetails->email) ?$userdetails->email: null, ['class' => 'form-control', 'required']) !!}
</div>
<!-- Website Field -->
<div class="form-group col-sm-12">
    {!! Form::label('website', __('forms.Website')) !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-12">
    {!! Form::label('telephone', __('forms.Telephone')) !!}
    {!! Form::text('telephone', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Picture Field -->
<div class="form-group col-sm-12">
    {!! Form::label('picture', __('forms.Picture')) !!}
    {!! Form::file('picture') !!}
</div>
<div class="clearfix"></div>

<!-- Shortdescription Field -->
<div class="form-group col-sm-12">
    {!! Form::label('shortDescription', __('forms.Shortdescription')) !!}
    {!! Form::text('shortDescription', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', __('forms.Description')) !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('paymentinfo', __('front.Payment details')) !!}
    {!! Form::text('paymentinfo', null, ['class' => 'form-control']) !!}
</div>


<!-- Fcburl Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fcburl', __('forms.Fcburl')) !!}
    {!! Form::text('fcburl', null, ['class' => 'form-control']) !!}
</div>

<!-- Twitturl Field -->
<div class="form-group col-sm-12">
    {!! Form::label('twitturl', __('forms.Twitturl')) !!}
    {!! Form::text('twitturl', null, ['class' => 'form-control']) !!}
</div>

<!-- Linkdinurl Field -->
<div class="form-group col-sm-12">
    {!! Form::label('linkdinurl', __('forms.Linkdinurl')) !!}
    {!! Form::text('linkdinurl', null, ['class' => 'form-control']) !!}
</div>

<!-- Dribbleurl Field -->
<div class="form-group col-sm-12">
    {!! Form::label('dribbleurl', __('forms.Dribbleurl')) !!}
    {!! Form::text('dribbleurl', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit(__('forms.Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('companies.index') }}" class="btn btn-secondary">@lang('front.Cancel')</a>
</div>
