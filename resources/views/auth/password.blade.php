@extends('layouts.guest')

@section('content')
    <h3 class="text-center">Bem-vindo! Faça seu login abaixo</h3>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {!! Form::open() !!}
    {!! Form::openGroup('email', 'Email') !!}
    {!! Form::email('email', null, ['placeholder' => 'email@exemplo.com.br']) !!}
    {!! Form::closeGroup() !!}

    {!! Form::openFormActions() !!}
    {!! Form::submit('Enviar Link', ['class' => 'btn btn-primary btn-lg btn-block form-action']) !!}
    {!! Form::closeFormActions() !!}
    {!! Form::close() !!}

    <div class="login-actions">
        <a href="/auth/login" class="btn btn-sm btn-block btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
    </div>
@endsection
