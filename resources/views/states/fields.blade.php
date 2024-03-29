<!-- Country Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('country_id', __('forms.country Name')) !!}
    {!! Form::select('country_id', $listcountries, null , ['class' => 'form-control select2']) !!}
</div>
@push('scripts')
    <script type="text/javascript">
        $('.select2').select2({
        width: '100%' // need to override the changed default
        });
   </script>

@endpush
<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', __('forms.Name')) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', __('forms.status')) !!}
    {!! Form::select('status', ['active' => 'active', ' inactive' => ' inactive'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit(__('forms.Save'), ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('states.index') }}" class="btn btn-secondary">@lang('front.Cancel')</a>
</div>
