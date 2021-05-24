<!-- timeline registrations -->
<ul class="vcv-timeline">
  <li class="vcv-timeline-item vcv-step-done" data-step="1" data-step-title="Download"><span>Download</span></li>
  <li class="vcv-timeline-item vcv-step-done" data-step="2"><span>Install</span></li>
  <li class="vcv-timeline-item" data-step="3"><span>Activate</span></li>
  <li class="vcv-timeline-item" data-step="4"><span>Go Premium</span></li>
</ul>
<!-- timeline registrations -->
<!-- Id Field -->

<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $registerations->id }}</p>
</div>

<!-- Session Id Field -->
<div class="form-group">
    {!! Form::label('session_id', 'Session Id:') !!}
    <p>{{ $registerations->session_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $registerations->user_id }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $registerations->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $registerations->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $registerations->updated_at }}</p>
</div>

