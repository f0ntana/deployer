{!! Form::model($record, ['method' => 'put', 'route' => ['config.environments.update', $record->id]]) !!}

{!! Form::openGroup('name', 'Nome') !!}
{!! Form::text('name', null, ['placeholder' => 'FC-PRODUÇÃO']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('folder', 'Pasta') !!}
{!! Form::text('folder', null, ['placeholder' => 'prod']) !!}
{!! Form::closeGroup() !!}

{!! Form::openFormActions() !!}
{!! Form::submit('Alterar', ['class' => 'btn btn-primary form-action']) !!}
{!! Form::closeFormActions() !!}

{!! Form::close() !!}