<div class="panel panel-default">
    <div class="panel-heading">Selecione uma branch</div>

    <div class="list-group checked-list-group">
        @if (count($records) && array_key_exists('branches', $records))
            @foreach($records['branches'] as $record)
                <a href="/deploy/environments/{{ $project }}/{{ $record['branch'] }}/{{ $record['hash'] }}" data-ajax-load="#environment-list" class="list-group-item load-environments">{{ $record['branch'] }}</a>
            @endforeach
        @endif
    </div>

    <div class="panel-footer">
        <div class="text-right">
            @if ($records['pagination']['previous'])
                <a href="{{ Request::url() }}?page={{ $records['pagination']['previous'] }}" class="btn btn-default btn-xs" data-ajax-load="#branch-list"><i class="fa fa-arrow-left"></i></a>
            @endif

            @if ($records['pagination']['next'])
                <a href="{{ Request::url() }}?page={{ $records['pagination']['next'] }}" class="btn btn-default btn-xs" data-ajax-load="#branch-list"><i class="fa fa-arrow-right"></i></a>
            @endif
        </div>
    </div>
</div>