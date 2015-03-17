<div class="container-fluid">
    <div class="row">
        @if ($environments->count())
            @foreach($environments as $environment)
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{ $environment->name }}</div>

                        <table class="table table-bordered">
                            @if ($environment->projects->count())
                                @foreach($environment->projects as $project)
                                    <tr>
                                        <td>{{ $project->name }}</td>
                                        <td>{{ $project->lastDeploy->created_at->format('d/m/Y H:i') }}</td>
                                        <td width="1%">
                                            <a href="{{ URL::route('deploy.execute', [
                                                $project->lastDeploy->project->slug,
                                                $project->lastDeploy->getRollbackHash(),
                                                $project->lastDeploy->environment->slug
                                            ]) }}" class="btn btn-xs btn-danger">
                                                <i class="fa fa-rotate-left"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>