@extends('layouts.empty')

@section('page')
    <aside class="navigation">
        @include('layouts.partials.loggeduser')
        @include('layouts.partials.navigation')
    </aside>

    <main class="main">
        @yield('content')
    </main>
@stop