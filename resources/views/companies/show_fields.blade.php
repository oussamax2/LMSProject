<div class="list-field-detalssessions row">
    <div class="col-sm-6 col-md-12 col-lg-4">

        @if(isset($companies['picture']) && $companies['picture'] != NULL)
            <!-- Picture Field -->
            <div class="form-group">
                <div class="image-companies">
                    <img src="{{ asset("storage/".$companies['picture']) }}" />
                </div>
            </div>
        @else

            <!-- Picture Field -->
            <div class="form-group">
                <div class="image-companies">
                    <img src="{{ asset("images/defaultuser.png") }}" />
                </div>
            </div>

        @endif
        <!-- Shortdescription Field -->
            <div class="form-group">
            <p>{{ $companies->shortDescription }}</p>
        </div>
        <ul class="social-media-companies">
         <!-- Fcburl Field -->
         <div class="form-group">
            @if(isset($companies->fcburl))
            <a href="{{ $companies->fcburl }}" class="tran3s"><i class="icon icon-social-facebook" aria-hidden="true"></i></a>
            @endif
        </div>
        <!-- Twitturl Field -->
        <div class="form-group">
            @if(isset($companies->twitturl))
            <a href="{{ $companies->twitturl }}" class="tran3s"><i class="icon icon-social-twitter" aria-hidden="true"></i></a>
            @endif
        </div>
        <!-- Linkdinurl Field -->
        <div class="form-group">
            @if(isset($companies->linkdinurl))
            <a href="{{ $companies->linkdinurl }}" class="tran3s"><i class="icon icon-social-linkedin" aria-hidden="true"></i></a>
            @endif
        </div>
        <!-- Dribbleurl Field -->
        <div class="form-group">
            @if(isset($companies->linkdinurl))
            <a href="{{ $companies->dribbleurl }}" class="tran3s"><i class="icon icon-social-dribbble" aria-hidden="true"></i></a>
            @endif
        </div>
        </ul>
    </div>
    <div class="col-sm-6 col-md-12 col-lg-4">
                    <!-- companyName Field -->
                    <div class="form-group">
        <i class="icon flaticon-bookmark"></i>
            {!! Form::label('name', __('forms.company Name')) !!}
            <p>{{ $companies->user->name }}</p>
        </div>
        <!-- Status Field -->
        <div class="form-group">
        <i class="icon flaticon-bookmark"></i>
            {!! Form::label('status', __('forms.Company status')) !!}

            @if($companies->status == 0)

            <p>@lang('front.Pending request')</p>

            @elseif($companies->status == 1)

            <p>@lang('front.Rejected request')</p>

            @elseif($companies->status == 2)

            <p>@lang('front.Accepted request')</p>

            @elseif($companies->status == 3)
            <p>@lang('front.Cancelled request')</p>
            @endif
        </div>
        <!-- Telephone Field -->
        <div class="form-group">
        <i class="icon icon-phone"></i>
            {!! Form::label('telephone', __('forms.Telephone')) !!}
            <p>{{ $companies->telephone }}</p>
        </div>
         <!-- Email Field -->
         <div class="form-group">
        <i class="icon icon-envelope"></i>
            {!! Form::label('email', __('forms.Company Email')) !!}
            <p>{{ $companies->user->email }}</p>
        </div>
        <!-- Website Field -->
        <div class="form-group">
        <i class="icon icon-globe"></i>
            {!! Form::label('website', __('forms.Website')) !!}
            <p>{{ $companies->website }}</p>
        </div>
        {{-- banner home --}}
    </div>
</div>
<div class="row">
<div class="col-md-12">
    <!-- courses Field -->
<div class="form-group">
    {!! Form::label('courses', __('forms.Company courses')) !!}
        @foreach ($listcourses as $listcourses)
            <p>{{ $listcourses->title }}</p>

            
            <div class="table-responsive">
                <table class="table table-bordered" style="margin:15px 0 0 0;">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">@lang('front.Start Date')</th>
                            <th scope="col">@lang('front.End Date')</th>
                            <th scope="col">@lang('front.fee')</th>
                            <th scope="col">@lang('front.city')</th>
                            </tr>
                        </thead>
                        <?php $i=1; ?>
                        @foreach ($listcourses->sessions()->get() as $sessions)
                            <tbody>
                                <tr>
                                    <th scope="row">{{$i++}}</th>
                                    <td>{{$sessions['start']}}</td>
                                    <td>{{$sessions['end']}}</td>
                                    <td>{{$sessions['fee']}}</td>
                                    <td>{{$sessions->cities->name}}</td>
                                </tr>
                            </tbody>
                        @endforeach
                </table>
            </div>
            
        @endforeach
</div>
</div>
</div>

