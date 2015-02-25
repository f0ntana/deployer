@extends('layouts.guest')

@section('content')
    <h3 class="text-center">Bem-vindo! Faça seu login abaixo</h3>

    {!! Form::open() !!}
        {!! Form::openGroup('email', 'Email') !!}
            {!! Form::email('email', null, ['placeholder' => 'email@exemplo.com.br']) !!}
        {!! Form::closeGroup() !!}

        {!! Form::openGroup('password', 'Senha') !!}
            {!! Form::password('password', ['placeholder' => 'senha']) !!}
        {!! Form::closeGroup() !!}

        <div class="form-group">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Lembrar Senha
                </label>
            </div>
        </div>

        {!! Form::openFormActions() !!}
            {!! Form::submit('Login', ['class' => 'btn btn-primary btn-lg btn-block form-action']) !!}
        {!! Form::closeFormActions() !!}
    {!! Form::close() !!}

    <div class="login-actions">
        <a href="{!! URL::to('remind')  !!}" class="btn btn-sm btn-block btn-default"><i class="fa fa-refresh"></i> Esqueçi minha senha</a>
        <a href="{!! URL::to('register')  !!}" class="btn btn-sm btn-block btn-default"><i class="fa fa-user"></i> Criar conta</a>
    </div>
@endsection
