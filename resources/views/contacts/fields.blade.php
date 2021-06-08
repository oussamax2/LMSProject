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

<!-- Phone Field -->
<div class="form-group col-sm-12">
    {!! Form::label('phone', __('forms.telephone')) !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Message Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('message', __('forms.message')) !!}
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit(__('forms.Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('contacts.index') }}" class="btn btn-secondary">@lang('front.Cancel')</a>
</div>
