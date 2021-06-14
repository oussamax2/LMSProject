

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('forms.Name')) !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', __('forms.Email')) !!}
    <p>{{ $user->email }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('forms.Created At')) !!}
    <p>{{ $user->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('forms.Updated At')) !!}
    <p>{{ $user->updated_at }}</p>
</div>

