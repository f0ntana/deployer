<table class="table table-bordered default-list">
    <thead>
    <tr>
        <th>Nome</th>
        <th width="1%">&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    @if ($records->count())
        @foreach($records as $record)
            <tr>
                <td>{{ $record->name }}</td>
                <td class="td-actions" nowrap>
                    {!! Form::model($record, ['method' => 'get', 'route' => ['system.roles.destroy', $record->id]]) !!}
                    {!! Form::button('edit', ['type' => 'submit', 'class' => 'btn btn-default btn-xs']) !!}
                    {!! Form::close() !!}

                    {!! Form::model($record, ['method' => 'delete', 'class' => 'delete-record', 'route' => ['system.roles.destroy', $record->id]]) !!}
                    {!! Form::button('delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs']) !!}
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