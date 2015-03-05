<div class="row permissions">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        {!! Form::open(['method' => 'post', 'route' => ['system.permissions.post', $record->id]]) !!}
        <div class="actions">
            @if (count($actions))
                @foreach($actions as $id => $value)
                    @if (Acl::hasPermissionById($id))
                        <div class="permission">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="permissions[]" {!! Acl::hasPermissionById($id, $record) ? "checked" : "" !!} value="{{ $id }}"> {{ $value }}
                                </label>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>

        {!! Form::openFormActions() !!}
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary form-action']) !!}
        {!! Form::closeFormActions() !!}
        {!! Form::close() !!}
    </div>
</div>
