<div class="list-field-detalssessions">
<!-- Name Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('name', __('forms.Name')) !!}
    <p>{{ $user->name }}</p>
</div>

<!-- Email Field -->
<div class="form-group">
<i class="icon icon-envelope-letter"></i>
    {!! Form::label('email', __('forms.Email')) !!}
    <p>{{ $user->email }}</p>
</div>

<!-- registerations Field -->
<div class="form-group">
<i class="icon icon-user-following"></i>
    {!! Form::label('registerations', __('forms.Registration Number')) !!}
    <p>{{ count($user->registerations) }}</p>
</div>
</div>

