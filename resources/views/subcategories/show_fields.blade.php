<div class="list-field-detalssessions row">
<div class="col-sm-6 col-md-12 col-lg-6">

<!-- Name Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('name', 'Name') !!}
    <p>{{ $subcategorie->name }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('category_id', 'Category Name') !!}
    <p>{{ $subcategorie->categories->name }}</p>
</div>
</div>
<div class="col-sm-6 col-md-12 col-lg-6">

<!-- Created At Field -->
<div class="form-group">
<i class="icon icon-clock"></i>
    {!! Form::label('created_at', 'Created At') !!}
    <p>{{Carbon\Carbon::parse($subcategorie->created_at)->isoFormat(' Do MMMM  YYYY ')}}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
<i class="icon icon-clock"></i>
    {!! Form::label('updated_at', 'Updated At') !!}
    <p>{{Carbon\Carbon::parse($subcategorie->updated_at)->isoFormat(' Do MMMM  YYYY ')}}</p>
</div>
</div>
</div>

