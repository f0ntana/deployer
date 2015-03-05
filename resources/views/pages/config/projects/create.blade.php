{!! Form::open(['method' => 'post', 'route' => ['config.projects.store']]) !!}
{!! Form::openGroup('name', 'Nome') !!}
{!! Form::text('name', null, ['placeholder' => 'LKD-Jobs']) !!}
{!! Form::closeGroup() !!}

{!! Form::openFormActions() !!}
{!! Form::submit('Adicionar', ['class' => 'btn btn-primary form-action']) !!}
{!! Form::closeFormActions() !!}
{!! Form::close() !!}