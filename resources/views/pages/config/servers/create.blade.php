{!! Form::open(['method' => 'post', 'route' => ['config.servers.store']]) !!}
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        {!! Form::openGroup('name', 'Nome') !!}
        {!! Form::text('name', null, ['placeholder' => 'FIRSTCLASS 1']) !!}
        {!! Form::closeGroup() !!}
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        {!! Form::openGroup('folder', 'Pasta dos Repositórios') !!}
        {!! Form::text('folder', null, ['placeholder' => '/var/www/repositorios']) !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        {!! Form::openFormActions() !!}
        {!! Form::submit('Adicionar', ['class' => 'btn btn-primary form-action']) !!}
        {!! Form::closeFormActions() !!}
    </div>
</div>
{!! Form::close() !!}