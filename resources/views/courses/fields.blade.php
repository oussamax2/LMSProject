<!-- Company Id Field -->


<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::text('body', null, ['class' => 'form-control']) !!}
</div>

<!-- Published On Field -->
<div class="form-group col-sm-12">
    {!! Form::label('published_on', 'Published On:') !!}
    {!! Form::text('published_on', null, ['class' => 'form-control','id'=>'published_on']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#published_on').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::Label('category_id',  __('front.category list:')) !!}
    {!! Form::select('category_id', $listcateg, $selectedID, ['class' => 'form-control select2']) !!}
</div>
<!-- Tags Field -->
<div class="form-group col-sm-12">
    {!! Form::label('tags', __('front.Target Audiance list:')) !!}
    {!! Form::text('tags', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
</div>
