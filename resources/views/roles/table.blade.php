<div class="table-responsive-sm">
    <table class="table table-striped" id="roles-table">
        <thead>
            <tr>
                <th>Id</th>
        <th>@lang('front.Name')</th>
        <th>@lang('front.Description')</th>
                <th colspan="3">@lang('front.Action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
            <td>{{ $role->name }}</td>
            <td>{{ $role->description }}</td>
                <td>
                    {!! Form::open(['route' => ['roles.destroy', $role->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('roles.show', [$role->id]) }}" class='btn btn-ghost-success'><span class="icon icon-eye"></span></a>
                        <a href="{{ route('roles.edit', [$role->id]) }}" class='btn btn-ghost-info'><span class="icon icon-note"></span></a>
                        {!! Form::button('<span class="icon icon-trash"></span>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>