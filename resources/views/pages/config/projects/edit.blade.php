{!! Form::model($record, ['method' => 'put', 'route' => ['config.projects.update', $record->id]]) !!}
{!! Form::openGroup('name', 'Nome') !!}
{!! Form::text('name', null, ['placeholder' => 'Atendimento']) !!}
{!! Form::closeGroup() !!}

{!! Form::openFormActions() !!}
{!! Form::submit('Alterar', ['class' => 'btn btn-primary form-action']) !!}
{!! Form::closeFormActions() !!}
{!! Form::close() !!}