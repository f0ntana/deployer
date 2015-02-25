@extends('layouts.empty')

@section('page')
    <div class="container guest">
        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-center">
            <div class="box">
                <div class="text-center">
                    <img src="/assets/img/logo.jpg" />
                </div>

                @yield('content')
            </div>
        </div>
    </div>
@stop