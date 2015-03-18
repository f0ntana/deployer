@extends('layouts.app')

@section('content')
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1 class="title pull-right"><i class="fa fa-skyatlas"></i>Deployer</h1>
                </div>
            </div>
        </div>
    </header>

    <section class="sub-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <h1>{{ $page['title'] }}</h1>
                </div>

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-right">
                    @if (is_array($page['actions']) && count($page['actions']))
                        @foreach($page['actions'] as $action)
                            <a href="{{ URL::route($action['route']) }}" class="btn {{ $action['btn'] }}"><i class="fa {{ $action['icon'] }}"></i> &nbsp; {{ $action['label'] }}</a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

    </section>

    <section class="content">
        <div class="container-fluid">
            @if (Session::has('message'))
                <div class="alert alert-{!! Session::get('message-class') !!}">
                    <p>{{ Session::get('message') }}</p>
                </div>
            @endif

                @include('errors.message')

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if (isset($contents))
                        @if (is_array($contents))
                            @foreach($contents as $content)
                                {!! $content !!}
                            @endforeach
                        @else
                            {!! $contents !!}
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
