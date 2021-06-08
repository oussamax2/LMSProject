<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('forms.Id')) !!}
    <p>{{ $language->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('forms.Name')) !!}
    <p>{{ $language->name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('forms.Created At')) !!}
    <p>{{ $language->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('forms.Updated At')) !!}
    <p>{{ $language->updated_at }}</p>
</div>

