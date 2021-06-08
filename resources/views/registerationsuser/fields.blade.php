<!-- Session Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('session_id', __('forms.Session Id')) !!}
    {!! Form::text('session_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('user_id', __('forms.User Id')) !!}
    {!! Form::text('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', __('forms.status')) !!}
    {!! Form::select('status', ['active' => 'active', ' inactive' => ' inactive'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit(__('forms.Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('registerationsuser.index') }}" class="btn btn-secondary">@lang('front.Cancel')</a>
</div>
