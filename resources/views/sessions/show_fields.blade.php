<div class="detailssessionlms">
<!-- Course Id Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('course_id', 'Course Title') !!}
    <p>{{ $sessions->courses->title}}</p>
</div>

<!-- Start Field -->
<div class="form-group">
<i class="icon flaticon-clock"></i>
    {!! Form::label('start', 'Start') !!}
    <p>{{Carbon\Carbon::parse($sessions->start)->isoFormat(' Do MMMM  YYYY ')}}</p>
</div>

<!-- End Field -->
<div class="form-group">
<i class="icon flaticon-clock"></i>
    {!! Form::label('end', 'End') !!}
    <p>{{Carbon\Carbon::parse($sessions->end)->isoFormat(' Do MMMM  YYYY ')}}</p>
</div>

<!-- Fee Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('fee', 'Fee') !!}
    <p>{{ $sessions->fee }}</p>
</div>

<!-- Language Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('language', 'Language') !!}
    <p>{{ $sessions->language }}</p>
</div>

<!-- Country Id Field -->
<div class="form-group">
<i class="icon flaticon-placeholder"></i>
    {!! Form::label('country_id', 'Country') !!}
    <p>{{ $sessions->countries->name}}</p>
</div>

<!-- City Field -->
<div class="form-group">
<i class="icon flaticon-placeholder"></i>
    {!! Form::label('city', 'City') !!}
    <p>{{ $sessions->cities->name }}</p>
</div>

<!-- Note Field -->
<div class="form-group">
<i class="icon icon-note"></i>
    {!! Form::label('note', 'Note') !!}
    <p>{{ $sessions->note }}</p>
</div>

</div>

