<div class="list-field-detalssessions row">
    <div class="col-sm-6 col-md-12 col-lg-6">
<!-- Name Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('name', __('forms.Name')) !!}
    <p>{{ $contact->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
<i class="icon icon-envelope"></i>
    {!! Form::label('email', __('forms.Email')) !!}
    <p>{{ $contact->email }}</p>
</div>
</div>
<div class="col-sm-6 col-md-12 col-lg-6">

<!-- Phone Field -->
<div class="form-group">
<i class="icon icon-phone"></i>
    {!! Form::label('phone', __('forms.telephone')) !!}
    <p>{{ $contact->phone }}</p>
</div>

<!-- Message Field -->
<div class="form-group">
<i class="icon icon-speech"></i>
    {!! Form::label('message', __('forms.message')) !!}
    <p>{{ $contact->message }}</p>
</div>
</div>
</div>

