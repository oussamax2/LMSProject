{!! Form::open(['route' => ['subcategories.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
    <a href="{{ route('subcategories.show', $id) }}" class='btn btn-ghost-success'>
       <span class="icon icon-eye"></span>
    </a>
    <a href="{{ route('subcategories.edit', $id) }}" class='btn btn-ghost-info'>
       <span class="icon icon-note"></span>
    </a>
    {!! Form::button('<span class="icon icon-trash"></span>', [
        'type' => 'submit',
        'class' => 'btn btn-ghost-danger',
        'onclick' => "return confirm('Are you sure?')"
    ]) !!}
</div>
{!! Form::close() !!}
