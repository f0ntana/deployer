<div class="panel panel-default">
    <div class="panel-heading">Selecione uma branch</div>

    <div class="list-group checked-list-group" id="selected-branch">
        @if ($records->count())
            @foreach($records as $record)
                <a href="/deploy/environments/{{ $project }}/{{ $record->slug }}" data-target="#environment-list" class="list-group-item load-environments">{{ $record->name }}</a>
            @endforeach
        @endif
    </div>

    <div class="panel-footer">
        <div class="text-right">
            @if ($records->previousPageUrl())
                <a href="{{ $records->previousPageUrl() }}" class="btn btn-default btn-xs" data-target="#branches-list"><i class="fa fa-arrow-left"></i></a>
            @endif

            @if ($records->nextPageUrl())
                <a href="{{ $records->nextPageUrl() }}" class="btn btn-default btn-xs" data-target="#branches-list"><i class="fa fa-arrow-right"></i></a>
            @endif
        </div>
    </div>
</div>