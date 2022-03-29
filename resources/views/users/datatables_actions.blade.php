<div class='btn-group'>
    <a href="{{ route('users.show', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-eye"></i>
    </a>
    <a href="{{ route('users.edit', $id) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-edit"></i>
    </a>
    <a href="{{ route('audits', ['id'=>$id,'tipo'=>'usuarios']) }}" class='btn btn-default btn-xs'>
        <i class="fa fa-book"></i>
    </a>
    {!! Form::open(['route' => ['users.destroy', $id], 'method' => 'delete']) !!}
        {!! Form::button('<i class="fa fa-trash"></i>', [
            'type' => 'submit',
            'class' => 'btn btn-danger btn-xs',
            'onclick' => 'return confirm("'.__('crud.are_you_sure').'")'
        ]) !!}
    {!! Form::close() !!}
</div>

