@extends('layouts.guest')

@section('content')
    <h3 class="text-center">Bem-vindo! Faça seu login abaixo</h3>

    {!! Form::open() !!}
    {!! Form::openGroup('name', 'Nome') !!}
    {!! Form::text('name', null, ['placeholder' => 'Seu Nome']) !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('email', 'Email') !!}
    {!! Form::email('email', null, ['placeholder' => 'Seu Email']) !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('password', 'Senha') !!}
    {!! Form::password('password', ['placeholder' => 'Senha']) !!}
    {!! Form::closeGroup() !!}

    {!! Form::openGroup('password_confirmation', 'Confirmar Senha') !!}
    {!! Form::password('password_confirmation', ['placeholder' => 'Repetir Senha']) !!}
    {!! Form::closeGroup() !!}

    {!! Form::openFormActions() !!}
    {!! Form::submit('Registrar', ['class' => 'btn btn-primary btn-lg btn-block form-action']) !!}
    {!! Form::closeFormActions() !!}
    {!! Form::close() !!}

    <div class="login-actions">
        <a href="/auth/login" class="btn btn-sm btn-block btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
    </div>
@endsection
