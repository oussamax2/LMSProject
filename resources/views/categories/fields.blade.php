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

@if(isset($categories->picture))
     <div class="image" ><img style="width: 185px;height: 157px;border: 3px solid #fff;border-radius: 50%;" src="{{ asset("storage/".$categories['picture']) }}" alt=""></div>

    <!-- Picture Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('picture', __('admin.Picture:')) !!}
        {!! Form::file('picture') !!}
    </div>
@else
 
        <!-- Picture Field -->
        <div class="form-group col-sm-12">
            {!! Form::label('picture', __('admin.Picture:')) !!}
            {!! Form::file('picture', ['required']) !!}
        </div>
@endif
<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('categories.index') }}" class="btn btn-secondary">Cancel</a>
</div>
