<!-- Start Field -->
<div class="form-group col-sm-12">
    {!! Form::label('start', 'Start:') !!}
    {!! Form::text('start', null, ['class' => 'form-control']) !!}
</div>

<!-- End Field -->
<div class="form-group col-sm-12">
    {!! Form::label('end', 'End:') !!}
    {!! Form::text('dateTime-local','end', null, ['class' => 'form-control']) !!}
</div>

<!-- Fee Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fee', 'Fee:') !!}
    {!! Form::text('fee', null, ['class' => 'form-control']) !!}
</div>

<!-- Language Field -->
<div class="form-group col-sm-12">
    {!! Form::label('language', 'Language:') !!}
    {!! Form::text('language', null, ['class' => 'form-control']) !!}
</div>

<!-- Course Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('course_id', 'Course Id:') !!}
    {!! Form::text('course_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Country Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('country_id', 'Country Id:') !!}
    {!! Form::text('country_id', null, ['class' => 'form-control']) !!}
</div>

<!-- State Field -->
<div class="form-group col-sm-12">
    {!! Form::label('state', 'State:') !!}
    {!! Form::text('state', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-12">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-12">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::text('note', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('sessions.index') }}" class="btn btn-secondary">Cancel</a>
</div>
