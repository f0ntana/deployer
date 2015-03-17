{!! Form::open(['method' => 'post', 'route' => ['config.profile.vcs']]) !!}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <h3 class="title"><i class="fa fa-github"></i> Configurações do GitHub</h3>
        {!! Form::openGroup('user', 'Usuário') !!}
        {!! Form::text("vcs[github][user]", $vcs['github']['user'], ['placeholder' => 'Usuário']) !!}
        {!! Form::closeGroup() !!}

        {!! Form::openGroup('password', 'Senha') !!}
        {!! Form::password('vcs[github][password]', ['placeholder' => 'Senha']) !!}
        {!! Form::closeGroup() !!}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <h3 class="title"><i class="fa fa-bitbucket"></i> Configurações do BitBucket</h3>
        {!! Form::openGroup('user', 'Usuário') !!}
        {!! Form::text('vcs[bitbucket][user]', $vcs['bitbucket']['user'], ['placeholder' => 'Usuário']) !!}
        {!! Form::closeGroup() !!}

        {!! Form::openGroup('password', 'Senha') !!}
        {!! Form::password('vcs[bitbucket][password]', ['placeholder' => 'Senha']) !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

{!! Form::openFormActions() !!}
{!! Form::submit('Salvar', ['class' => 'btn btn-primary form-action']) !!}
{!! Form::closeFormActions() !!}
{!! Form::close() !!}