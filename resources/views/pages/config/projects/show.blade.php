<div class="form-group">
    <label for="folder">Nome</label>

    <div>{{ $project->name }}</div>
</div>

<div class="form-group">
    <label for="folder">Repositorio</label>

    <div>{{ $project->repository }}</div>
</div>

<div class="form-group">
    <label for="folder">Pasta no Servidor</label>

    <div>{{ $project->folder }}</div>
</div>

<div class="form-group">
    <label for="folder">Envoy</label>

    <div>
        {!! nl2br($project->envoy) !!}
    </div>
</div>