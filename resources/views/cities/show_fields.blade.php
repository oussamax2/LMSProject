<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Cities Name:') !!}
    <p>{{ $cities->name }}</p>
</div>

<!-- State Id Field -->
<div class="form-group">
    {!! Form::label('state_id', 'State Name:') !!}
    <p>{{ $cities->states['name'] }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Status:') !!}
    <p>{{ $cities->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $cities->created_at }}</p>
</div>

