{!! Form::open(['method' => 'post', 'route' => ['config.servers.connect', $id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-center">
        {!! Form::openGroup('password', 'Senha do servidor') !!}
        {!! Form::password('password', ['placeholder' => 'Senha']) !!}
        {!! Form::closeGroup() !!}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 col-center text-right">
        {!! Form::openFormActions() !!}
        {!! Form::submit('Autenticar', ['class' => 'btn btn-primary form-action']) !!}
        {!! Form::closeFormActions() !!}
    </div>
</div>
{!! Form::close() !!}