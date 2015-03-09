<div class="row permissions">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        {!! Form::open(['method' => 'post', 'route' => ['config.environments.servers.save', $record->id]]) !!}
        <div class="actions">
            @if (count($servers))
                @foreach($servers as $server)
                    <div class="permission">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="server[]" {!! $server->environments->contains($record->id) ? 'checked' : '' !!} value="{{ $server->id }}"> {{ $server->name }}
                            </label>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        {!! Form::openFormActions() !!}
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary form-action']) !!}
        {!! Form::closeFormActions() !!}
        {!! Form::close() !!}
    </div>
</div>