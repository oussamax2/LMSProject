<div class="list-field-detalssessions row">
<div class="col-sm-6 col-md-12 col-lg-6">
<!-- Name Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('name', 'Name') !!}
    <p>{{ $states->name }}</p>
</div>
<!-- Country Id Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('country_name', 'Country Name') !!}
    <p>{{ $states->countries->name }}</p>
</div>
<!-- Status Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('status', 'Status') !!}
    <p>{{ $states->status }}</p>
</div>
</div>
<div class="col-sm-6 col-md-12 col-lg-6">
<!-- Created At Field -->
<div class="form-group">
<i class="icon icon-clock"></i>
    {!! Form::label('created_at', 'Created At') !!}
    <p>{{Carbon\Carbon::parse($states->created_at)->isoFormat(' Do MMMM  YYYY ')}}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
<i class="icon icon-clock"></i>
    {!! Form::label('updated_at', 'Updated At') !!}
    <p>{{Carbon\Carbon::parse($states->updated_at)->isoFormat(' Do MMMM  YYYY ')}}</p>
</div>
</div>
</div>

