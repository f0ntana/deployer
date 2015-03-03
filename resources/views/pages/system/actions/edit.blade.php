{!! Form::model($record, ['method' => 'put', 'route' => ['system.actions.update', $record->id]]) !!}
<div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        {!! Form::openGroup('name', 'Nome') !!}
        {!! Form::text('name', null, ['placeholder' => 'Servidores']) !!}
        {!! Form::closeGroup() !!}

        {!! Form::openGroup('action_id', 'Pai') !!}
        {!! Form::select('action_id', $actions, null, ['placeholder' => 'Atendimento']) !!}
        {!! Form::closeGroup() !!}

        {!! Form::openGroup('order', 'Ordem') !!}
        {!! Form::text('order', null, ['placeholder' => '2']) !!}
        {!! Form::closeGroup() !!}
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        {!! Form::openGroup('action', 'Ação') !!}
        {!! Form::text('action', null, ['placeholder' => 'config.servers.index']) !!}
        {!! Form::closeGroup() !!}

        {!! Form::openGroup('type', 'Tipo') !!}
        {!! Form::select('type', ['M' => 'Menu', 'A' => 'Ação'], null, ['placeholder' => 'Atendimento']) !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        {!! Form::openFormActions() !!}
        {!! Form::submit('Alterar', ['class' => 'btn btn-primary form-action']) !!}
        {!! Form::closeFormActions() !!}
    </div>
</div>
{!! Form::close() !!}