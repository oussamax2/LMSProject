<div class="table-responsive-sm">
    <table class="table table-striped" id="roles-table">
        <thead>
            <tr>
              
        <th>@lang('front.Name')</th>
        <th>@lang('front.Description')</th>
                <th colspan="3">@lang('front.Action')</th>
            </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                
            <td>{{ $role->name }}</td>
            <td>{{ $role->description }}</td>
                <td>
                   
                    <div class='btn-group'>
                        <a href="{{ route('roles.show', [$role->id]) }}" class='btn btn-ghost-success'><span class="icon icon-eye"></span></a>

                    </div>
                  
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>