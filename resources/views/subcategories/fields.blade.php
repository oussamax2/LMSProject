<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::Label('category_id', __('front.category list:')) !!}
    {!! Form::select('category_id', $listcateg, null, ['class' => 'form-control select2']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
        $('.select2').select2({
        width: '100%' // need to override the changed default
        });
   </script>

@endpush
<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('subcategories.index') }}" class="btn btn-secondary">Cancel</a>
</div>
