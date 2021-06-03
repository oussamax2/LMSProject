<!-- Start Field -->
<!-- Category Id Field -->

<div class="form-group col-sm-12">
    {!! Form::Label('course_id', __('front.courses list:')) !!}
    {!! Form::select('course_id', $listcourses, null, ['class' => 'select2 form-control' ]) !!}
</div>
<div class="form-group col-sm-12">
    {!! Form::label('start', __('forms.Session startDate')) !!}
    {!! Form::text('start', null, ['class' => 'form-control','id'=>'start', 'required']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
    $('.select2').select2({
    width: '100%' // need to override the changed default
});
    </script>
   <script type="text/javascript">
           $('#start').datetimepicker({
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


<!-- End Field -->
<div class="form-group col-sm-12">
    {!! Form::label('end', __('forms.Session endDate')) !!}
    {!! Form::text('end', null, ['class' => 'form-control','id'=>'end', 'required']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#end').datetimepicker({
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



<!-- Fee Field -->
<div class="form-group col-sm-12">
    {!! Form::label('fee', __('front.Session fee')) !!}
    {!! Form::text('fee', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::Label('language', __('front.language list:')) !!}
    {!! Form::select('language', $listlanguage, null, ['class' => 'form-control']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::Label('country_id', __('front.countries list:')) !!}
    {!! Form::select('country_id', $listcountries, null, ['class' => 'form-control select2','id'=>'country_id']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::Label('state', __('front.states list:')) !!}
    {!! Form::select('state', $liststates, null, ['class' => 'form-control select2' ,'id'=>'state']) !!}
</div>

<!-- Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::Label('city', __('front.cities list:')) !!}
    {!! Form::select('city', $listcities, null, ['class' => 'form-control select2']) !!}
</div>

<!-- Note Field -->
<div class="form-group col-sm-12">
    {!! Form::label('note', 'Note:') !!}
    {!! Form::text('note', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('sessions.index') }}" class="btn btn-secondary">Cancel</a>
</div>


@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
        $('select[name="state"]').empty();
        $('select[name="country_id"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/state/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {


                        $('select[name="state"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="state"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="state"]').empty();
            }
        });
        $('select[name="city"]').empty();
        $('select[name="state"]').on('change', function() {
            var stateID = $(this).val();
            if(stateID) {
                $.ajax({
                    url: '/city/ajax/'+stateID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {


                        $('select[name="city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="city"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });


                    }
                });
            }else{
                $('select[name="city"]').empty();
            }
        });

    });
</script>
@endpush
