<div class="panel with-nav-tabs panel-default">
    <div class="panel-heading">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab1default" data-toggle="tab">Meus Dados</a></li>
            <li><a href="#tab2default" data-toggle="tab">VCS</a></li>
        </ul>
    </div>
    <div class="panel-body">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1default">
                @include('pages.config.profile.tabs.dados')
            </div>
            <div class="tab-pane fade" id="tab2default">
                @include('pages.config.profile.tabs.vcs')
            </div>
        </div>
    </div>
</div>