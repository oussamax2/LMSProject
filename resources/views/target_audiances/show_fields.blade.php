<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', __('forms.Name')) !!}
    <p>{{ $targetAudiance->name }}</p>
</div>

<!-- Order Field -->
<div class="form-group">
    {!! Form::label('order', __('forms.courses list')) !!}




        <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">@lang('forms.Course Title')</th>
                    <th scope="col"></th>

                    </tr>
                </thead>
                <?php $i=1; ?>
                @foreach ($targetAudiance->courses as $listcourses)

                    <tbody>
                        <tr>
                          <th scope="row">{{$i++}}</th>

                            <td>{{$listcourses['title']}}</td>
                            <td>
                                <a href="{{route('courses.show', $listcourses['id'])}}" class="btn btn-ghost-success">
                                    <span class="icon icon-eye">

                                    </span>
                                </a>
                            </td>


                        </tr>


                    </tbody>
                @endforeach
        </table>




</div>

