<div class="list-field-detalssessions">
<!-- Title Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('title', 'Title') !!}
    <p>{{ $courses->title }}</p>
</div>

<!-- Company Id Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('company_id', 'Company Name') !!}
    <p>{{ $courses->companies->user->name }}</p>
</div>


<!-- Body Field -->
<div class="form-group">
<i class="icon icon-book-open"></i>
    {!! Form::label('body', 'course Desciption') !!}
    <p>{{ $courses->body }}</p>
</div>

<!-- Published On Field -->
<div class="form-group">
<i class="icon icon-clock"></i>
    {!! Form::label('published_on', 'Published On') !!}
    <p>{{ $courses->published_on }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('category_id', 'Category Name') !!}
    <p>{{ $courses->categories->name }}</p>
</div>

<!-- Session List Field -->
<div class="form-group listregistersession">
<i class="icon icon-briefcase"></i>
    {!! Form::label('order', __('front.Session List')) !!}
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('front.Start date')</th>
                <th scope="col">@lang('front.End date')</th>
                <th scope="col">@lang('front.Session fee')</th>
                <th scope="col">@lang('front.Country name')</th>
                </tr>
            </thead>
            <?php $i=1; ?>
            @foreach ($courses->sessions as $listsess) 
                <tbody>
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>{{$listsess['start']}}</td>
                        <td>{{$listsess['end']}}</td>
                        <td>{{$listsess['fee']}}</td>
                        <td>{{$listsess->countries['name']}}</td>                        
                    </tr>
                </tbody>
            @endforeach    
        </table>
        </div>
</div>
</div>

