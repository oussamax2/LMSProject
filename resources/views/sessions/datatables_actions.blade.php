@if(!$deleted_at)
{!! Form::open(['route' => ['sessions.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('sessions.show', $id) }}" class='btn btn-ghost-success'>
       <span class="icon icon-eye"></span>
    </a>
    <a href="{{ route('sessions.edit', $id) }}" class='btn btn-ghost-info'>
       <span class="icon icon-note"></span>
    </a>
    {!! Form::button('<span class="icon icon-trash"></span>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
@else
{!! Form::open(['route' => ['sessions.reset', $id], 'method' => 'GET']) !!}
<div class='btn-group'>
    {!! Form::button('<i class="fa  fa-history" aria-hidden="true"></i> Reset', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
@endif
