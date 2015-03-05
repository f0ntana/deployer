<div class="loggeduser">
    <figure>
        <img src="/assets/img/user.jpg" alt="{{ Auth::user()->name }}" class="img-responsive img-circle" height="73" width="73"/>
        <figcaption>{{ Auth::user()->name }}</figcaption>
    </figure>

    <div class="actions">
        <a href="/profile" class="btn btn-xs"><i class="fa fa-user"></i> Meus Dados</a>
        <a href="/auth/logout" class="btn btn-xs"><i class="fa fa-sign-out"></i> Sair</a>
    </div>
</div>