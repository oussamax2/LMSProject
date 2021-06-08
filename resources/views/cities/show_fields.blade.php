<div class="list-field-detalssessions row">
    <div class="col-sm-6 col-md-12 col-lg-4">
      <!-- Picture Field -->
      <div class="form-group">
            <div class="image-companies">
                <img src="{{ asset("storage/".$cities['picture']) }}"/>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-12 col-lg-8">
    <!-- Id Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('id', __('forms.Name')) !!}
    <p>{{ $cities->name }}</p>
</div>

<!-- State Id Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('state_id', __('forms.State Name')) !!}
    <p>{{ $cities->states['name'] }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('status', __('forms.status')) !!}
    <p>{{ $cities->status }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
<i class="icon icon-clock"></i>
    {!! Form::label('created_at', __('forms.Created At')) !!}
    <p>{{Carbon\Carbon::parse($cities->created_at)->isoFormat(' Do MMMM  YYYY ')}}</p>
</div>
    </div>

