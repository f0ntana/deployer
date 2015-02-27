@extends('layouts.app')

@section('content')
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                    <a href="" class="btn btn-default btn-block"><i class="fa fa-comments"></i></a>
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
                    @if (count($page['actions']))
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
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    @if (is_array($contents))
                        @foreach($contents as $content)
                            {!! $content !!}
                        @endforeach
                    @else
                        {!! $contents !!}
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
