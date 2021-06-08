<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('forms.Id')) !!}
    <p>{{ $messaging->id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('front.User Id')) !!}
    <p>{{ var_dump($messaging->user) }}</p>
</div>

<!-- Registeration Id Field -->
<div class="form-group">
    {!! Form::label('registeration_id', __('front.Registeration Id')) !!}
    <p>{{ $messaging->registeration }}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', __('forms.message')) !!}
    <p>{{ $messaging->message }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('forms.Created At')) !!}
    <p>{{ $messaging->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('forms.Updated At')) !!}
    <p>{{ $messaging->updated_at }}</p>
</div>

