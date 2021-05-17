<!-- companyName Field -->
<div class="form-group">
    {!! Form::label('name', 'company Name:') !!}
    <p>{{ $companies->user->name }}</p>
</div>
@if($companies->status == 0)

    <a href="{{ route('verifcompany', $companies->id) }}" class="btn btn-outline-success" name="acceptcompany" value="accept">@lang('front.Accept request')</a>
    <a href="{{ route('verifcompany', $companies->id) }}" class="btn btn-outline-success" name="declinecompany" value="decline">@lang('front.Decline request')</a>
        


@endif
<!-- Email Field -->
<div class="form-group">
    {!! Form::label('email', 'Company Email:') !!}
    <p>{{ $companies->user->email }}</p>
</div>
<!-- Website Field -->
<div class="form-group">
    {!! Form::label('website', 'Website:') !!}
    <p>{{ $companies->website }}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', 'Company status:') !!}
       
        @if($companies->status == 0)
                                        
         <p>@lang('front.Pending request')</p>
         
        @elseif($companies->status == 1)
          <p>@lang('front.Accepted request')</p>

        @elseif($companies->status == 2)
          <p>@lang('front.Rejected request')</p>

        @elseif($companies->status == 3)
          <p>@lang('front.Cancelled request')</p>

        @endif
</div>
<!-- Telephone Field -->
<div class="form-group">
    {!! Form::label('telephone', 'Telephone:') !!}
    <p>{{ $companies->telephone }}</p>
</div>

<!-- Picture Field -->
<div class="form-group">
    {!! Form::label('picture', 'Picture:') !!}
    <p>{{ $companies->picture }}</p>
</div>

<!-- Shortdescription Field -->
<div class="form-group">
    {!! Form::label('shortDescription', 'Shortdescription:') !!}
    <p>{{ $companies->shortDescription }}</p>
</div>

<!-- Fcburl Field -->
<div class="form-group">
    {!! Form::label('fcburl', 'Fcburl:') !!}
    <p>{{ $companies->fcburl }}</p>
</div>

<!-- Twitturl Field -->
<div class="form-group">
    {!! Form::label('twitturl', 'Twitturl:') !!}
    <p>{{ $companies->twitturl }}</p>
</div>

<!-- Linkdinurl Field -->
<div class="form-group">
    {!! Form::label('linkdinurl', 'Linkdinurl:') !!}
    <p>{{ $companies->linkdinurl }}</p>
</div>

<!-- Dribbleurl Field -->
<div class="form-group">
    {!! Form::label('dribbleurl', 'Dribbleurl:') !!}
    <p>{{ $companies->dribbleurl }}</p>
</div>


<!-- courses Field -->
<div class="form-group">
    {!! Form::label('courses', 'Company courses:') !!}
        @foreach ($listcourses as $listcourses)
            <p>{{ $listcourses->title }}</p>
       
            @foreach ($listcourses->sessions()->get() as $sessions)

                <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Start Date</th>
                            <th scope="col">End Date</th>
                            <th scope="col">fee</th>
                            <th scope="col">city</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>{{$sessions['start']}}</td>
                                <td>{{$sessions['end']}}</td>
                                <td>{{$sessions['fee']}}</td>
                                <td>{{$sessions->cities->name}}</td>
                             
                            
                            </tr>
                        
                        
                        </tbody>
                </table>
            @endforeach
        @endforeach
</div>
