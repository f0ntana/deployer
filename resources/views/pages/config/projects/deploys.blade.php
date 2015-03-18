@if ($deploys->count())
    <table class="table table-bordered">
        @foreach($deploys as $deploy)
            <tr>
                <td width="33%">{{ $deploy->branch }}</td>
                <td width="33%">{{ $deploy->environment->name }}</td>
                <td width="33%">{{ $deploy->created_at->format('d/m/Y H:i') }}</td>
                <td width="1%">
                    <a href="{{ $deploy->getExecuteUrl() }}" class="btn btn-xs btn-danger" data-confirm="Atenção, esta operação pode ser irreversível. Deseja prosseguir?"><i class="fa fa-undo"></i></a>
                </td>
            </tr>
        @endforeach
    </table>
@endif