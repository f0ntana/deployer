<div class="panel panel-default">
    <div class="panel-heading">Selecione um ambiente</div>

    <div class="list-group checked-list-group">
        @if ($records->count())
            @foreach($records as $record)
                <a href="/deploy/make/{{ $project }}/{{ $branch }}/{{ $record->slug }}" data-ajax-load="#make-deploy" class="list-group-item">{{ $record->name }}</a>
            @endforeach
        @endif
    </div>


    <div class="panel-footer">
        <div class="text-right">
            @if ($records->previousPageUrl())
                <a href="{{ $records->previousPageUrl() }}" class="btn btn-default btn-xs" data-ajax-load="#environment-list"><i class="fa fa-arrow-left"></i></a>
            @endif

            @if ($records->nextPageUrl())
                <a href="{{ $records->nextPageUrl() }}" class="btn btn-default btn-xs" data-ajax-load="#environment-list"><i class="fa fa-arrow-right"></i></a>
            @endif
        </div>
    </div>
</div>