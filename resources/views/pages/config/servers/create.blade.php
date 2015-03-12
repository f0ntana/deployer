{!! Form::open(['method' => 'post', 'route' => ['config.servers.store']]) !!}

{!! Form::openGroup('name', 'Nome') !!}
{!! Form::text('name', null, ['placeholder' => 'FIRSTCLASS 1']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('ip', 'IP') !!}
{!! Form::text('ip', null, ['placeholder' => '177.252.183.25']) !!}
{!! Form::closeGroup() !!}

{!! Form::openFormActions() !!}
{!! Form::submit('Adicionar', ['class' => 'btn btn-primary form-action']) !!}
{!! Form::closeFormActions() !!}

{!! Form::close() !!}