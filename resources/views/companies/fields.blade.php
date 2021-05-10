<!-- Lastname Field -->
<div class="form-group col-sm-6">
    {!! Form::label('lastname', 'Lastname:') !!}
    {!! Form::text('lastname', null, ['class' => 'form-control']) !!}
</div>

<!-- Website Field -->
<div class="form-group col-sm-6">
    {!! Form::label('website', 'Website:') !!}
    {!! Form::text('website', null, ['class' => 'form-control']) !!}
</div>

<!-- Telephone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('telephone', 'Telephone:') !!}
    {!! Form::text('telephone', null, ['class' => 'form-control']) !!}
</div>

<!-- Picture Field -->
<div class="form-group col-sm-6">
    {!! Form::label('picture', 'Picture:') !!}
    {!! Form::file('picture') !!}
</div>
<div class="clearfix"></div>

<!-- Shortdescription Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shortDescription', 'Shortdescription:') !!}
    {!! Form::text('shortDescription', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Fcburl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fcburl', 'Fcburl:') !!}
    {!! Form::text('fcburl', null, ['class' => 'form-control']) !!}
</div>

<!-- Twitturl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('twitturl', 'Twitturl:') !!}
    {!! Form::text('twitturl', null, ['class' => 'form-control']) !!}
</div>

<!-- Linkdinurl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('linkdinurl', 'Linkdinurl:') !!}
    {!! Form::text('linkdinurl', null, ['class' => 'form-control']) !!}
</div>

<!-- Dribbleurl Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dribbleurl', 'Dribbleurl:') !!}
    {!! Form::text('dribbleurl', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancel</a>
</div>
