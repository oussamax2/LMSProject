
<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('front.Name:')) !!}
    <p>{{ $categories->name }}</p>
</div>

<!-- Order Field -->
<div class="form-group">
    {!! Form::label('order', __('front.Order:')) !!}
    <p>{{ $categories->order }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('front.Created At:')) !!}
    <p>{{ $categories->created_at }}</p>
</div>

<!-- Order Field -->
<div class="form-group">
    {!! Form::label('order', __('front.Subcategory List:')) !!}
    

   

        <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('front.Subcategory name')</th>
                    
                    </tr>
                </thead>
                {{$i=1}}
                @foreach ($listsubcateg as $listsubcateg) 
                   
                    <tbody>
                        <tr>
                            <th scope="row">{{$i++}}</th>
                            <td>{{$listsubcateg['name']}}</td>
                        
                        
                        
                        </tr>
                    
                    
                    </tbody>
                @endforeach    
        </table>
    



</div>
