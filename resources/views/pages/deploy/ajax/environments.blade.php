<div class="panel panel-default">
    <div class="panel-heading">Selecione um ambiente</div>

    <div class="list-group checked-list-group" id="selected-environment">
        @if ($records->count())
            @foreach($records as $record)
                <a href="/deploy/environments/{{ $record->slug }}" class="list-group-item">{{ $record->name }}</a>
            @endforeach
        @endif
    </div>


    <div class="panel-footer">
        <div class="text-right">
            @if ($records->previousPageUrl())
                <a href="{{ $records->previousPageUrl() }}" class="btn btn-default btn-xs" data-target="#project-list"><i class="fa fa-arrow-left"></i></a>
            @endif

            @if ($records->nextPageUrl())
                <a href="{{ $records->nextPageUrl() }}" class="btn btn-default btn-xs" data-target="#project-list"><i class="fa fa-arrow-right"></i></a>
            @endif
        </div>
    </div>
</div>