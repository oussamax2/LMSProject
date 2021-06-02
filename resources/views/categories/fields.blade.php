<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Order Field -->
<div class="form-group col-sm-12">
    {!! Form::label('order', 'Order:') !!}
    {!! Form::text('order', null, ['class' => 'form-control']) !!}
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
@if(isset($categories->picture))
       <!-- Picture Field -->
       <div class="form-group col-sm-12">
            {!! Form::label('picture', __('admin.Picture:')) !!}

                {!! Form::file('picture', ['id' =>'imgInp']) !!}

                <img id="blah" src="{{ asset("storage/".$categories['picture']) }}" style="width: 238px;height: 238px;" />

        </div>
@else

        <!-- Picture Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('picture', __('admin.Picture:')) !!}

                {!! Form::file('picture', ['required','id' =>'imgInp']) !!}

                <img id="blah" src="{{ asset("images/no-image.png") }}" style="width: 238px;height: 238px;" />

        </div>
@endif
<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
</div>
