{!! Form::open(['route' => ['registerationsuser.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('registerationsuser.show', $id) }}" class='btn btn-ghost-success'>
       <span class="icon icon-eye"></span>
    </a>


</div>
{!! Form::close() !!}
