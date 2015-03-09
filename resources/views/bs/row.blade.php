<div class="row">
    @if (isset($cols) && is_array($cols))
        @foreach($cols as $col)
            {!! $col !!}
        @endforeach
    @endif
</div>