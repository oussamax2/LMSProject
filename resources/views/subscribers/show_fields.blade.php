<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', __('forms.Email')) !!}
    <p>{{ $subscribers->email }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('forms.Created At')) !!}
    <p>{{ $subscribers->created_at }}</p>
</div>


