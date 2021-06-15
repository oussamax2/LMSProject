<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', __('forms.Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email', __('forms.Email')) !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('password', __('forms.Password')) !!}
    <input type="password" class="form-control {{ $errors->has('password')?'is-invalid':'' }}" name="password" >
    @if ($errors->has('password'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif
</div>
<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit(__('forms.Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('indexadmins') }}" class="btn btn-secondary">@lang('front.Cancel')</a>
</div>
