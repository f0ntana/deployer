{!! Form::open(['method' => 'post', 'route' => ['config.projects.store']]) !!}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        {!! Form::openGroup('name', 'Nome') !!}
        {!! Form::text('name', null, ['placeholder' => 'LKD-Jobs']) !!}
        {!! Form::closeGroup() !!}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        {!! Form::openGroup('repository', 'Repositório') !!}
        {!! Form::text('repository', null, ['placeholder' => 'git@github.com:LojasKD/LKD-Jobs.git']) !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        {!! Form::openGroup('envoy', 'Envoy') !!}
        {!! Form::textarea('envoy', null, ['placeholder' => 'Tarefas do Envoy']) !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

{!! Form::openFormActions() !!}
{!! Form::submit('Adicionar', ['class' => 'btn btn-primary form-action']) !!}
{!! Form::closeFormActions() !!}
{!! Form::close() !!}