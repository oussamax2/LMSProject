<div class="list-field-detalssessions row">
<div class="col-sm-6 col-md-12 col-lg-6">

<!-- Name Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('name', __('forms.Name')) !!}
    <p>{{ $tag->name }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('category_id', __('forms.Category Name')) !!}
    <p>{{ $tag->categories->name }}</p>
</div>
</div>
<div class="col-sm-6 col-md-12 col-lg-6">

<!-- Created At Field -->
<div class="form-group">
<i class="icon icon-clock"></i>
    {!! Form::label('created_at', __('forms.Created At')) !!}
    <p>{{Carbon\Carbon::parse($tag->created_at)->isoFormat(' Do MMMM  YYYY ')}}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
<i class="icon icon-clock"></i>
    {!! Form::label('updated_at', __('forms.Updated At')) !!}
    <p>{{Carbon\Carbon::parse($tag->updated_at)->isoFormat(' Do MMMM  YYYY ')}}</p>
</div>
</div>

