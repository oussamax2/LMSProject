<!-- Course Id Field -->
<div class="form-group">
    {!! Form::label('course_id', 'Course Name:') !!}
    <p>{{ $sessions->courses['title'] }}</p>
</div>

<!-- Start Field -->
<div class="form-group">
    {!! Form::label('start', 'Start:') !!}
    <p>{{ $sessions->start }}</p>
</div>

<!-- End Field -->
<div class="form-group">
    {!! Form::label('end', 'End:') !!}
    <p>{{ $sessions->end }}</p>
</div>
@if($sessions->fee == 0)
    <!-- Fee Field -->
    <div class="form-group">
        {!! Form::label('fee', 'Fee:') !!}
        <p>FREE</p>
    </div>
@else
    <!-- Fee Field -->
    <div class="form-group">
        {!! Form::label('fee', 'Fee:') !!}
        <p>{{ $sessions->fee }}</p>
    </div>
@endif
<!-- Language Field -->
<div class="form-group">
    {!! Form::label('language', 'Language:') !!}
    <p>{{ $sessions->language }}</p>
</div>

<!-- Country Id Field -->
<div class="form-group">
    {!! Form::label('country_id', 'Country:') !!}
    <p>{{ $sessions->countries['name'] }}</p>
</div>

<!-- State Field -->
<div class="form-group">
    {!! Form::label('state', 'State:') !!}
    <p>{{ $sessions->states['name'] }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', 'City:') !!}
    <p>{{ $sessions->cities['name'] }}</p>
</div>

<!-- Note Field -->
<div class="form-group">
    {!! Form::label('note', 'Note:') !!}
    <p>{{ $sessions->note }}</p>
</div>

<!-- Order Field -->
<div class="form-group">
    {!! Form::label('order', __('front.Registration List:')) !!}
    

   

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


