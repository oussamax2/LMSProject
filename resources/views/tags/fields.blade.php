<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', __('forms.Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('category_id', __('forms.category_id')) !!}
    {!! Form::text('category_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit(__('forms.Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('tags.index') }}" class="btn btn-secondary">@lang('front.Cancel')</a>
</div>
