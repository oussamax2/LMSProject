<div class="list-field-detalssessions row">
<div class="col-sm-6 col-md-12 col-lg-6">
<!-- Course Id Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('course_id', 'Course Title') !!}
    <p>{{ $sessions->courses->title}}</p>
</div>

<!-- Start Field -->
    <!-- start Field -->
<div class="form-group">
<i class="icon flaticon-clock"></i>
    {!! Form::label('start', 'Start') !!}
    <p>{{Carbon\Carbon::parse($sessions->start)->isoFormat(' Do MMMM  YYYY ')}}</p>
</div>
<!-- End Field -->
<div class="form-group">
<i class="icon flaticon-clock"></i>
    {!! Form::label('end', 'End') !!}
    <p>{{Carbon\Carbon::parse($sessions->end)->isoFormat(' Do MMMM  YYYY ')}}</p>
</div>
@if($sessions->fee == 0)
    <!-- Fee Field -->
    <div class="form-group">
    <i class="icon flaticon-bookmark"></i>
        {!! Form::label('fee', 'Fee:') !!}
        <p>FREE</p>
    </div>
@else
    <!-- Fee Field -->
    <div class="form-group">
    <i class="icon flaticon-bookmark"></i>
        {!! Form::label('fee', 'Fee:') !!}
        <p>{{ $sessions->fee }}</p>
    </div>
@endif
<!-- Language Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('language', 'Language') !!}
    <p>{{ $sessions->language }}</p>
</div>
</div>
<div class="col-sm-6 col-md-12 col-lg-6">

<!-- Country Id Field -->
<div class="form-group">
<i class="icon flaticon-placeholder"></i>
    {!! Form::label('country_id', 'Country') !!}
    <p>{{ $sessions->countries->name}}</p>
</div>

<!-- City Field -->
<div class="form-group">
<i class="icon flaticon-placeholder"></i>
    {!! Form::label('city', 'City') !!}
    <p>{{ $sessions->cities->name }}</p>
</div>

<!-- Note Field -->
<div class="form-group">
<i class="icon icon-note"></i>
    {!! Form::label('note', 'Note') !!}
    <p>{{ $sessions->note }}</p>
</div>
</div>
</div>

<!-- Order Field -->
<div class="form-group listregistersession">
    {!! Form::label('order', __('front.Registration List:')) !!}
    <div class="table-responsive">
    <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('front.User name')</th>
                <th scope="col">@lang('front.status')</th>

                </tr>
            </thead>
            {{$i=1}}
            @foreach ($sessions->registerations as $listreg)
                <tbody>
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$listreg->user['name']}}</td>
                        <td>{{$listreg->status}}</td>
                    </tr>
                </tbody>
            @endforeach
    </table>
    </div>
</div>


