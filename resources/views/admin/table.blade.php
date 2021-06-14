<div class="table-responsive-sm">
    <table class="table table-striped" id="roles-table">
        <thead>
            <tr>
               
                <th>@lang('front.Name')</th>
                <th>@lang('front.Email')</th>
                <th colspan="3">@lang('front.Action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($admin as $admin)
            <tr>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
                <td>
                    {!! Form::open(['route' => ['destroyadmins', $admin->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('showadmins', [$admin->id]) }}" class='btn btn-ghost-success'><span class="icon icon-eye"></span></a>
                        {!! Form::button('<span class="icon icon-trash"></span>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>