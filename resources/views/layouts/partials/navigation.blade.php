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
                <li><a href="/">Dashboard</a></li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#toggleDemo" data-parent="#sidenav01" class="collapsed">
                        Sistema &nbsp; <span class="caret pull-right"></span>
                    </a>

                    <div class="collapse" id="toggleDemo" style="height: 0px;">
                        <ul class="nav nav-list">
                            <li><a href="{{ URL::route('system.roles.index') }}">Perfis</a></li>
                            <li><a href="{{ URL::route('system.actions.index') }}">Ações</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>