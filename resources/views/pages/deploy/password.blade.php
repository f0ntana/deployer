<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-center">
        <div class="panel panel-default">
            <div class="panel-heading">Autorização necessária</div>

            <div class="panel-body">
                {!! Form::open(['method' => 'post', 'route' => ['deploy.password.post', $project, $branch, $commit, $environment]]) !!}

                {!! Form::openGroup('password', 'Senha') !!}
                {!! Form::password('password', ['placeholder' => 'Informe a senha']) !!}
                {!! Form::closeGroup() !!}

                {!! Form::openFormActions() !!}
                {!! Form::submit('Continuar', ['class' => 'btn btn-primary pull-right form-action']) !!}
                {!! Form::closeFormActions() !!}

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>