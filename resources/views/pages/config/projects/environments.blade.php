<div class="row permissions">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        {!! Form::open(['method' => 'post', 'route' => ['config.projects.environments', $record->id]]) !!}
        <div class="actions">
            @if (count($environments))
                @foreach($environments as $environment)
                    <div class="permission">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="environment[]" value="{{ $environment->id }}"> {{ $environment->name }}
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