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
