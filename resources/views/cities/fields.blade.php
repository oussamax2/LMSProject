<!-- Category Id Field -->
<div class="form-group col-sm-12">
    {!! Form::Label('state_id', __('front.states list:')) !!}
    {!! Form::select('state_id', $liststates, $selectedID, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

@if(isset($cities->picture))
   <div class="image" ><img style="width: 185px;height: 157px;border: 3px solid #fff;border-radius: 50%;" src="{{ asset("storage/".$cities['picture']) }}" alt=""></div>
@endif

<!-- Picture Field -->
<div class="form-group col-sm-12">
    {!! Form::label('picture', __('admin.Picture:')) !!}
    {!! Form::file('picture', ['required']) !!}
</div>

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
