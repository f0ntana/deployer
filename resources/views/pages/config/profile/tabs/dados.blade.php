{!! Form::open(['method' => 'post', 'route' => ['config.profile.data']]) !!}

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        {!! Form::openGroup('name', 'Nome') !!}
        {!! Form::text('name', Auth::user()->name, ['placeholder' => 'Nome Completo']) !!}
        {!! Form::closeGroup() !!}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        {!! Form::openGroup('email', 'Email') !!}
        {!! Form::text('email', Auth::user()->email, ['placeholder' => 'ti@lojaskd.com.br']) !!}
        {!! Form::closeGroup() !!}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        {!! Form::openGroup('password', 'Senha') !!}
        {!! Form::text('password', null, ['placeholder' => 'Senha']) !!}
        {!! Form::closeGroup() !!}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        {!! Form::openGroup('password_confirmation', 'Confirmar Senha') !!}
        {!! Form::text('password_confirmation', null, ['placeholder' => 'Repita a senha']) !!}
        {!! Form::closeGroup() !!}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        {!! Form::openGroup('picture', 'Imagem') !!}
        {!! Form::file('picture', ['placeholder' => 'Foto']) !!}
        {!! Form::closeGroup() !!}
    </div>
</div>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        {!! Form::openFormActions() !!}
        {!! Form::submit('Salvar', ['class' => 'btn btn-primary form-action']) !!}
        {!! Form::closeFormActions() !!}
        {!! Form::close() !!}
    </div>
</div>