<div class="panel {!! $class !!}" id="{!! isset($id) ? $id : '' !!}">

    @if (isset($title))
        <div class="panel-heading">{!! $title !!}</div>
    @endif

        @if (isset($body))
            <div class="panel-body">
                {!! $body !!}
            </div>
        @endif

        @if (isset($nobody))
            {!! $nobody !!}
        @endif

    @if (isset($footer))
        <div class="panel-footer">{!! $footer !!}</div>
    @endif
</div>