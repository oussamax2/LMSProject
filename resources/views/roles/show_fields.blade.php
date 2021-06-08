

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('forms.Name')) !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('forms.Description')) !!}
    <p>{{ $role->description }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('forms.Created At')) !!}
    <p>{{ $role->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('forms.Updated At')) !!}
    <p>{{ $role->updated_at }}</p>
</div>

