{!! Form::open() !!}
{!! Form::openGroup('name', 'Nome') !!}
{!! Form::email('name', null, ['placeholder' => 'Atendimento']) !!}
{!! Form::closeGroup() !!}

{!! Form::openFormActions() !!}
{!! Form::submit('Adicionar', ['class' => 'btn btn-primary form-action']) !!}
{!! Form::closeFormActions() !!}
{!! Form::close() !!}