<div class="row">
    @if ($environments->count())
        @foreach($environments as $environment)
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $environment->name }}</div>

                    @if ($environment->projects)
                        <table class="table table-bordered">
                            @foreach($environment->projects as $project)
                                @if ($project->lastDeploy($environment->id))
                                    <tr>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->lastDeploy($environment->id)->branch }}</td>
                                        <td>{{ $project->lastDeploy($environment->id)->created_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        @endforeach
    @endif
</div>