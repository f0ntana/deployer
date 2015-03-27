<table class="table table-bordered default-list">
    <thead>
    <tr>
        <th>Nome</th>
        <th width="19%">Criado</th>
        <th width="1%">Ações</th>
    </tr>
    </thead>
    <tbody>
    @if (count($records))
        @foreach($records as $record)
            <tr>
                <td>{{ $record->name }}</td>
                <td>{{ $record->created_at }}</td>
                <td class="td-actions" nowrap>
                    {!! Form::open(['method' => 'get', 'route' => ['config.servers.edit', $record->id]]) !!}
                    {!! Form::button('editar', ['type' => 'submit', 'class' => 'btn btn-default btn-xs']) !!}
                    {!! Form::close() !!}

                    {!! Form::open(['method' => 'get', 'route' => ['config.servers.connect', $record->id]]) !!}
                    {!! Form::button('conectar', ['type' => 'submit', 'class' => 'btn btn-default btn-xs']) !!}
                    {!! Form::close() !!}

                    {!! Form::open(['method' => 'delete', 'class' => 'delete-record', 'route' => ['config.servers.destroy', $record->id]]) !!}
                    {!! Form::button('remover', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="10">Nenhum registro encontrado.</td>
        </tr>
    @endif
    </tbody>
</table>
