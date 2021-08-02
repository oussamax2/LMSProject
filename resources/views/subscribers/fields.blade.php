<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', __('forms.Email')) !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('subscribers.index') }}" class="btn btn-secondary">@lang('front.Cancel')</a>
</div>
