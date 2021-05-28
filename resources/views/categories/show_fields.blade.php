<div class="list-field-detalssessions row">
    <div class="col-sm-6 col-md-12 col-lg-4">
        <!-- Picture Field -->
        <div class="form-group">
            <div class="image-companies">
                <img src="{{ asset("storage/".$categories['picture']) }}"/>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-md-12 col-lg-8">
      <!-- Name Field -->
      <div class="form-group">
        <i class="icon flaticon-bookmark"></i>
            {!! Form::label('name', __('front.Name')) !!}
            <p>{{ $categories->name }}</p>
        </div>
        <!-- Order Field -->
        <div class="form-group">
        <i class="icon flaticon-bookmark"></i>
            {!! Form::label('order', __('front.Order')) !!}
            <p>{{ $categories->order }}</p>
        </div>
        <!-- Created At Field -->
        <div class="form-group">
        <i class="icon icon-clock"></i>
            {!! Form::label('created_at', __('front.Created At')) !!}
            <p>{{Carbon\Carbon::parse($categories->created_at)->isoFormat(' Do MMMM  YYYY ')}}</p>
        </div>
    </div>
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
