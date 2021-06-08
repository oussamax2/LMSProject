<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', __('forms.Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', __('forms.status')) !!}
    {!! Form::select('status', ['active' => 'active', 'inactive' => 'inactive'], null, ['class' => 'form-control']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('continent', __('forms.Continent')) !!}
    {!! Form::select('continent', ['Africa' => 'Africa', 'Europe' => 'Europe', 'Asia' => 'Asia', 'north_america' => 'north america', 'south_america' => 'south america'], null, ['class' => 'form-control']) !!}
</div>
<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit(__('forms.Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('countries.index') }}" class="btn btn-secondary">@lang('front.Cancel')</a>
</div>
