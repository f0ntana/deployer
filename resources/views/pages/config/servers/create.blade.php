{!! Form::open(['method' => 'post', 'route' => ['config.servers.store']]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        {!! Form::openGroup('name', 'Nome') !!}
        {!! Form::text('name', null, ['placeholder' => 'FIRSTCLASS 1']) !!}
        {!! Form::closeGroup() !!}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        {!! Form::openGroup('ip', 'IP') !!}
        {!! Form::text('ip', null, ['placeholder' => '177.252.183.25']) !!}
        {!! Form::closeGroup() !!}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
        {!! Form::openGroup('login', 'Usuário') !!}
        {!! Form::text('login', null, ['placeholder' => 'ec2-user']) !!}
        {!! Form::closeGroup() !!}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        {!! Form::openFormActions() !!}
        {!! Form::submit('Adicionar', ['class' => 'btn btn-primary form-action']) !!}
        {!! Form::closeFormActions() !!}
    </div>
</div>
{!! Form::close() !!}