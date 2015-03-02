{!! Form::open(['method' => 'post', 'route' => ['system.roles.store']]) !!}
{!! Form::openGroup('name', 'Nome') !!}
{!! Form::text('name', null, ['placeholder' => 'Atendimento']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('role_id', 'Pai') !!}
{!! Form::select('role_id', [], null, ['placeholder' => 'Atendimento']) !!}
{!! Form::closeGroup() !!}

{!! Form::openFormActions() !!}
{!! Form::submit('Adicionar', ['class' => 'btn btn-primary form-action']) !!}
{!! Form::closeFormActions() !!}
{!! Form::close() !!}