<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <form action="" method="post">
            @if (count($actions))
                @foreach($actions as $id => $value)
                    <div class="permission">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> {{ $value }}
                            </label>
                        </div>
                    </div>
                @endforeach
            @endif
        </form>
    </div>
</div>
