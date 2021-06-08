<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('forms.Name')) !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('forms.Email')) !!}
    <p>{{ $user->email }}</p>
</div>



