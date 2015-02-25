@extends('layouts.empty')

@section('page')
    <section class="navigation">
        @include('layouts.partials.loggeduser')
        @include('layouts.partials.navigation')
    </section>

    <section class="main">
        @yield('content')
    </section>
@stop