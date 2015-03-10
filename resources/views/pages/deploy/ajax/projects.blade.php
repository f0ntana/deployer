<div class="panel panel-default" id="project-list">
    <div class="panel-heading">Selecione um projeto</div>

    <div class="list-group">
        @if ($records->count())
            @foreach($records as $record)
                <a href="#" class="list-group-item">{{ $record->name }}</a>
            @endforeach
        @endif
    </div>

    <div class="panel-footer">
        <div class="text-right">
            <a href="" class="btn btn-default btn-xs"><i class="fa fa-arrow-left"></i></a>
            <a href="" class="btn btn-default btn-xs"><i class="fa fa-arrow-right"></i></a>
        </div>
    </div>
</div>