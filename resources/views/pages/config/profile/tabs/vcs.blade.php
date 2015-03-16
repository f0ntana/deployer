{!! Form::open(['method' => 'post', 'route' => ['config.projects.store']]) !!}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <h3>Configurações do GitHub</h3>
        {!! Form::openGroup('user', 'Usuário') !!}
        {!! Form::text('user', null, ['placeholder' => 'Usuário']) !!}
        {!! Form::closeGroup() !!}

        {!! Form::openGroup('password', 'Senha') !!}
        {!! Form::password('password', ['placeholder' => 'Senha']) !!}
        {!! Form::closeGroup() !!}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <h3>Configurações do BitBucket</h3>
        {!! Form::openGroup('user', 'Usuário') !!}
        {!! Form::text('user', null, ['placeholder' => 'Usuário']) !!}
        {!! Form::closeGroup() !!}

        {!! Form::openGroup('password', 'Senha') !!}
        {!! Form::password('password', ['placeholder' => 'Senha']) !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

{!! Form::openFormActions() !!}
{!! Form::submit('Adicionar', ['class' => 'btn btn-primary form-action']) !!}
{!! Form::closeFormActions() !!}
{!! Form::close() !!}