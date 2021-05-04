<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $courseTag->id }}</p>
</div>

<!-- Course Id Field -->
<div class="form-group">
    {!! Form::label('course_id', 'Course Id:') !!}
    <p>{{ $courseTag->course_id }}</p>
</div>

<!-- Tag Id Field -->
<div class="form-group">
    {!! Form::label('tag_id', 'Tag Id:') !!}
    <p>{{ $courseTag->tag_id }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $courseTag->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $courseTag->updated_at }}</p>
</div>

