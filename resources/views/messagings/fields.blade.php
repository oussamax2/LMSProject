<!-- User Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('user_id', __('front.User Id')) !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Registeration Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('registeration_id', __('front.Registeration Id')) !!}
    {!! Form::number('registeration_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Message Field -->
<div class="form-group col-sm-12">
    {!! Form::label('message', __('forms.message')) !!}
    {!! Form::text('message', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit(__('forms.Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('messagings.index') }}" class="btn btn-secondary">@lang('front.Cancel')</a>
</div>
