
<div class="list-field-detalssessions">
<!-- Title Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('title', __('forms.Title')) !!}
    <p>{{ $courses->title }}</p>
</div>

<!-- Company Id Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('company_id', __('forms.Company Name')) !!}
    <p>{{ $courses->companies->user->name }}</p>
</div>


<!-- Body Field -->
<div class="form-group">
<i class="icon icon-book-open"></i>
    {!! Form::label('body', __('forms.Course Desciption')) !!}
    <p>{{ $courses->body }}</p>
</div>

<!-- Published On Field -->
<div class="form-group">
<i class="icon icon-clock"></i>
    {!! Form::label('published_on', __('forms.Published On')) !!}
    <p>{{Carbon\Carbon::parse($courses->created_at)->isoFormat(' Do MMMM  YYYY ')}}</p>
</div>

<!-- Published On Field -->
<div class="form-group">
    <i class="icon icon-clock"></i>
        {!! Form::label('published_on', __('forms.Changed On')) !!}
        <p>{{Carbon\Carbon::parse($courses->update_at)->isoFormat(' Do MMMM  YYYY ')}}</p>
    </div>

<!-- Category Id Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('category_id', __('forms.Category Name')) !!}
    <p>{{ $courses->categories->name }}</p>
</div>
<!-- SubCategory Id Field -->
<div class="form-group">
    <i class="icon flaticon-bookmark"></i>
        {!! Form::label('subcategorie', __('front.Sub Categories')) !!}
        <p>{{ isset($courses->subcategorie->name) ?$courses->subcategorie->name: "no subcategorie" }}</p>

    </div>
<!-- Target_audiance Id Field -->
<div class="form-group">
<i class="icon flaticon-bookmark"></i>
    {!! Form::label('target_audiance', __('front.Target Audiance :')) !!}
    <p>{{ implode(", ",json_decode($courses->target_audiance->pluck('name'))) }}</p>
</div>

<!-- Session List Field -->
<div class="form-group listregistersession">
<i class="icon icon-briefcase"></i>
    {!! Form::label('order', __('forms.Session List')) !!}
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">@lang('front.Start date')</th>
                <th scope="col">@lang('front.End date')</th>
                <th scope="col">@lang('front.Session fee')</th>
                <th scope="col">@lang('front.Country name')</th>
                <th scope="col"></th>
                </tr>
                
            </thead {{$i = ($sessList->currentPage()-1) * $sessList->perPage()}}>
           
            @foreach ($sessList as $listsess)
                <tbody>
                    <tr>
                        <th scope="row">{{++$i}}</th>
                        <td>{{Carbon\Carbon::parse($listsess['start'])->isoFormat('dddd, MMMM Do YYYY, h:mm')}}</td>
                        <td>{{Carbon\Carbon::parse($listsess['end'])->isoFormat('dddd, MMMM Do YYYY, h:mm')}}</td>
                        <td>{{$listsess['fee']}}</td>
                        <td>{{$listsess->countries['name']}}</td>
                        <td>
                            <a href="{{route('sessions.show', $listsess->id)}}" class="btn btn-ghost-success">
                                <span class="icon icon-eye">

                                </span>
                            </a>
                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        <div>
            {{ $sessList->links('vendor.custompaginate') }}
        </div>
        </div>
</div>
</div>

