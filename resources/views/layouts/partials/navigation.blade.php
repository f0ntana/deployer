<div class="sidebar-nav">
    <div class="navbar" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse sidebar-navbar-collapse">
            <ul class="nav navbar-nav">
                @if (Acl::hasPermission('dashboard'))
                <li><a href="/">Dashboard</a></li>
                @endif

                @if (Acl::hasPermission('system'))
                <li>
                    <a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
                        Sistema &nbsp; <span class="caret pull-right"></span>
                    </a>

                    <div class="collapse" id="toggleDemo" style="height: 0px;">
                        <ul class="nav nav-list">
                            @if (Acl::hasPermission('system.roles.index'))
                            <li><a href="{{ URL::route('system.roles.index') }}">Perfis</a></li>
                            @endif

                            @if (Acl::hasPermission('system.actions.index'))
                            <li><a href="{{ URL::route('system.actions.index') }}">Ações</a></li>
                            @endif
                        </ul>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</div>