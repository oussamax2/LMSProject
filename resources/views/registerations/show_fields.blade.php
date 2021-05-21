
<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', __('forms.User Name')) !!}
    <p>{{ $registerations->user['name'] }}</p>
</div>

<!-- Session Id Field -->
<div class="form-group">
    {!! Form::label('session_id', __('forms.Course Title')) !!}
    <p>{{ $registerations->sessions->courses->title }}</p>
</div>
<!-- Session Id Field -->
<div class="form-group">
    {!! Form::label('session_id', __('forms.Session startDate')) !!}
    <p>{{ $registerations->sessions->start }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $registerations->created_at }}</p>
</div>


