<!-- Start Field -->
<div class="form-group col-sm-12">
    {!! Form::label('start', __('forms.Session startDate')) !!}
    {!! Form::text('start', null, ['class' => 'form-control', 'id' => 'start']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#start').datetimepicker({
            format: 'YYYY-MM-DD hh:m:ss',
            useCurrent: true
        })
        $('#end').datetimepicker({
            format: 'YYYY-MM-DD hh:m:ss',
            useCurrent: true
        })



    $('.select2').select2();



    </script>
@endpush

<!-- End Field -->
<div class="form-group col-sm-12">
    {!! Form::label('end', __('forms.Session endDate')) !!}
    {!! Form::text('end', null, ['class' => 'form-control', 'id' => 'end']) !!}
</div>



<!-- Fee Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fee', __('front.Session fee')) !!}
    {!! Form::text('fee', null, ['class' => 'form-control']) !!}
</div>

<!-- Language Field -->
<div class="form-group col-sm-12">
    {!! Form::label('language', 'Language:') !!}
    {!! Form::text('language', null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::Label('course_id', __('front.courses list:')) !!}
    {!! Form::select('course_id', $listcourses, $selectedID, ['class' => 'select2 form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::Label('country_id', __('front.courses list:')) !!}
    {!! Form::select('country_id', $listcountries, $selectedID, ['class' => 'form-control select2']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::Label('state', __('front.courses list:')) !!}
    {!! Form::select('state', $liststates, $selectedID, ['class' => 'form-control select2']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::Label('city', __('front.courses list:')) !!}
    {!! Form::select('city', $listcities, $selectedID, ['class' => 'form-control select2']) !!}
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

