<div class="panel panel-default">
    <div class="panel-heading">Selecione um ambiente</div>

    <div class="list-group checked-list-group">
        @if ($records->count())
            @foreach($records as $record)
                <a href="/dashboard/deploys/{{ $project }}/{{ $record->slug }}" data-ajax-load="#deploy-list" class="list-group-item">{{ $record->name }}</a>
            @endforeach
        @endif
    </div>
</div>