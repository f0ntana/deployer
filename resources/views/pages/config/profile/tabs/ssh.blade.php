{!! Form::open(['method' => 'post', 'route' => ['config.profile.vcs']]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <h3 class="title"><i class="fa fa-key"></i> Chave de Acesso</h3>

        <p>Adicione esta chave de acesso ao arquivo "~/.ssh/authorized_keys"</p>

        <div class="well">
            {{ $ssh['rsa'] }}
        </div>
    </div>
</div>
{!! Form::close() !!}