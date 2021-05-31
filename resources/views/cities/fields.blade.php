<!-- Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::Label('state_id', __('front.states list:')) !!}
    {!! Form::select('state_id', $liststates, null , ['class' => 'form-control select2']) !!}
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
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>
    @push('scripts')
        <script type="text/javascript">
            imgInp.onchange = evt => {
                const [file] = imgInp.files
                if (file) {
                    blah.src = URL.createObjectURL(file)
                }
            }
    </script>
    @endpush  
@if(isset($cities->picture) && $cities['picture'] != NULL)

   <!-- Picture Field -->
   <div class="form-group col-sm-12">
            {!! Form::label('picture', __('admin.Picture:')) !!}
           
                {!! Form::file('picture', ['id' =>'imgInp']) !!} 
                
                <img id="blah" src="{{ asset("storage/".$cities['picture']) }}" style="width: 238px;height: 238px;" />
          
        </div>

@else
     
        <!-- Picture Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('picture', __('admin.Picture:')) !!}
           
                {!! Form::file('picture', ['id' =>'imgInp']) !!} 
                
                <img id="blah" src="{{ asset("images/no-image.png") }}" style="width: 238px;height: 238px;" />
          
        </div>

@endif



<!-- Status Field -->
<div class="form-group col-sm-12">
    {!! Form::label('status', 'Status:') !!}
    {!! Form::select('status', ['active' => 'active', ' inactive' => ' inactive'], null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cities.index') }}" class="btn btn-secondary">Cancel</a>
</div>
