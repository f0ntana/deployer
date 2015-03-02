{!! Form::model($record, ['method' => 'put', 'route' => ['system.roles.update', $record->id]]) !!}
{!! Form::openGroup('name', 'Nome') !!}
{!! Form::text('name', null, ['placeholder' => 'Atendimento']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('role_id', 'Pai') !!}
{!! Form::select('role_id', [], null, ['placeholder' => 'Atendimento']) !!}
{!! Form::closeGroup() !!}

{!! Form::openFormActions() !!}
{!! Form::submit('Alterar', ['class' => 'btn btn-primary form-action']) !!}
{!! Form::closeFormActions() !!}
{!! Form::close() !!}