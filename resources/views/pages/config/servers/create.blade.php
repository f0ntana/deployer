{!! Form::open(['method' => 'post', 'route' => ['config.servers.store']]) !!}

{!! Form::openGroup('name', 'Nome') !!}
{!! Form::text('name', null, ['placeholder' => 'FIRSTCLASS 1']) !!}
{!! Form::closeGroup() !!}

{!! Form::openGroup('folder', 'Pasta dos Repositórios') !!}
{!! Form::text('folder', null, ['placeholder' => '/var/www/repositorios']) !!}
{!! Form::closeGroup() !!}

{!! Form::openFormActions() !!}
{!! Form::submit('Adicionar', ['class' => 'btn btn-primary form-action']) !!}
{!! Form::closeFormActions() !!}

{!! Form::close() !!}