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
<!-- Email Field -->
<div class="form-group col-sm-12">
    {!! Form::label('password', __('forms.password')) !!}
    {!! Form::password('password', null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit(__('forms.Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-secondary">@lang('front.Cancel')</a>
</div>
