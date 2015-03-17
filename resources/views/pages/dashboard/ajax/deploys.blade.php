<div class="panel panel-default">
    <div class="panel-heading">Selecione um commit</div>

    <div class="list-group checked-list-group">
        @if ($records->count())
            @foreach($records as $record)
                <a href="/deploy/make/{{ $project }}/{{ $record->commit }}/{{ $environment }}" data-ajax-load="#make-deploy" class="list-group-item">
                    {{ substr($record->commit, 0, 10) }} -
                    {{ $record->created_at->format('d/m/Y H:i') }}
                </a>
            @endforeach
        @endif
    </div>
</div>