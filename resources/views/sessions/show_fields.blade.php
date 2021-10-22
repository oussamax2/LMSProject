<div class="list-field-detalssessions row">
<div class="col-sm-6 col-md-12 col-lg-6">
<!-- Course Id Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('course_id', __('forms.Course Title')) !!}
    <a  style="color: #36d64c;font-size: 18px; font-weight: 700;" href="{{ route('detailcourses',$sessions->courses->id )}}"><p>{{ $sessions->courses->title}}</p></a>
</div>

<!-- Start Field -->
    <!-- start Field -->
<div class="form-group">
<i class="icon flaticon-clock"></i>
    {!! Form::label('start', __('forms.Start')) !!}
    <p>{{Carbon\Carbon::parse($sessions->start)->isoFormat('lll')}}</p>
</div>
<!-- End Field -->
<div class="form-group">
<i class="icon flaticon-clock"></i>
    {!! Form::label('end', __('forms.End')) !!}
    <p>{{Carbon\Carbon::parse($sessions->end)->isoFormat('lll')}}</p>
</div>
@if($sessions->fee == 0)
    <!-- Fee Field -->
    <div class="form-group">
    <i class="icon flaticon-bookmark"></i>
        {!! Form::label('fee', __('forms.Fee')) !!}
        <p>FREE</p>
    </div>
@else
    <!-- Fee Field -->
    <div class="form-group">
    <i class="icon flaticon-bookmark"></i>
        {!! Form::label('fee', __('forms.Fee')) !!}
        <p>{{ $sessions->fee }} <strong>USD</strong></p>
    </div>
@endif
<!-- Language Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('language', __('forms.Language')) !!}
    <p>{{ $sessions->languages->name }}</p>
</div>
</div>
<div class="col-sm-6 col-md-12 col-lg-6">

<!-- Country Id Field -->
<div class="form-group">
    <i class="icon flaticon-bookmark"></i>
    {!! Form::label('sess_type', __('forms.Session Type')) !!}
    <p>{{ $sessions->sess_type}}</p>
</div>
<div class="form-group">
    <i class="icon flaticon-placeholder"></i>
    {!! Form::label('country_id', __('forms.Country')) !!}
    <p>{{ $sessions->countries->name}}</p>
</div>

<!-- City Field -->
<div class="form-group">
    <i class="icon flaticon-placeholder"></i>
        {!! Form::label('State', __('forms.State')) !!}
        <p>{{ isset($sessions->states->name) ? $sessions->states->name:'No city' }}</p>
    </div>
<div class="form-group">
<i class="icon flaticon-placeholder"></i>
    {!! Form::label('city', __('forms.City')) !!}
    <p>{{ isset($sessions->cities->name) ? $sessions->cities->name:'No city' }}</p>
</div>


<!-- Note Field -->
<div class="form-group">
<i class="icon icon-note"></i>
    {!! Form::label('note', __('forms.Note')) !!}
    <p>{{ $sessions->note }}</p>
</div>
</div>
</div>

<!-- Order Field -->
<div class="form-group listregistersession">
    {!! Form::label('order', __('forms.Registration List')) !!}
    <div class="table-responsive">
    <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('front.User name')</th>
                <th scope="col">@lang('front.status')</th>
                <th scope="col"></th>
                </tr>
            </thead {{$i = ($regstrionList->currentPage()-1) * $regstrionList->perPage()}}>
            
            @foreach ($regstrionList as $listreg)
                <tbody>
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{$listreg->user['name']}}</td>




                        @if($listreg->status == 0)

                            <td>@lang('front.New')</td>

                        @elseif($listreg->status == 1)

                            <td>@lang('front.Rejected')</td>

                        @elseif($listreg->status == 2)

                            <td>@lang('front.pending-payment')</td>

                        @elseif($listreg->status == 3)
                            <td>@lang('front.Confirmed')</td>
                        @endif

                        <td>
                            <a href="{{route('registerations.show', $listreg->id)}}" class="btn btn-ghost-success">
                                <span class="icon icon-eye">

                                </span>
                            </a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
    </table>
    <div>
     {{ $regstrionList->links('vendor.custompaginate') }}
    </div>
    </div>
</div>


