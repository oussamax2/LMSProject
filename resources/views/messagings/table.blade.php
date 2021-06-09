<div class="table-responsive-sm">
    <table class="table table-striped" id="messagings-table">
        <thead>
            <tr>
                <th>@lang('front.User Id')</th>
        <th>@lang('front.Registeration Id')</th>
        <th>@lang('front.message')</th>
                <th colspan="3">@lang('front.Action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($messagings as $messaging)
            <tr>
                <td>{{ $messaging->user_id }}</td>
            <td>{{ $messaging->registeration_id }}</td>
            <td>{{ $messaging->message }}</td>
                <td>
                    {!! Form::open(['route' => ['messagings.destroy', $messaging->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('messagings.show', [$messaging->id]) }}" class='btn btn-ghost-success'><span class="icon icon-eye"></span></a>
                        <a href="{{ route('messagings.edit', [$messaging->id]) }}" class='btn btn-ghost-info'><span class="icon icon-note"></span></a>
                        {!! Form::button('<span class="icon icon-trash"></span>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>