<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $targetAudiance->name }}</p>
</div>

<!-- Order Field -->
<div class="form-group">
    {!! Form::label('order', __('forms.courses list:')) !!}
    

   

        <table class="table table-bordered">
                <thead>
                    <tr>
                  
                    <th scope="col">@lang('forms.Course Title')</th>
                    
                    </tr>
                </thead>
                {{$i=1}}
                @foreach ($targetAudiance->courses as $listcourses) 
                   
                    <tbody>
                        <tr>
                          
                            <td>{{$listcourses['title']}}</td>
                        
                        
                        
                        </tr>
                    
                    
                    </tbody>
                @endforeach    
        </table>
    



</div>
