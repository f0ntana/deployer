<div class="panel {!! $class !!}">

    @if (isset($title))
        <div class="panel-heading">{!! $title !!}</div>
    @endif

    <div class="panel-body">
        {!! $body !!}
    </div>

    @if (isset($footer))
        <div class="panel-footer">{!! $footer !!}</div>
    @endif
</div>