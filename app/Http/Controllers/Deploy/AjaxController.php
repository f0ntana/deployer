<?php namespace App\Http\Controllers\Deploy;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Repositories\Vcs\BitBucketRepository;
use App\Repositories\Vcs\GitHubRepository;
use App\Services\Vcs\BitBucketService;
use App\Services\Vcs\VersionControlService;
use Request;

class AjaxController extends Controller
{

    private $versionControl;

    public function __construct(VersionControlService $versionControl)
    {
        $this->versionControl = $versionControl;
    }

    /**
     * @Get("deploy/projects", as="deploy.ajax.projects")
     */
    public function projects()
    {
        $Projects = Project::orderBy('name')->simplePaginate(5);

        return view('pages.deploy.ajax.projects', [
            'records' => $Projects
        ]);
    }

    /**
     * @Get("deploy/branches/{project}", as="deploy.ajax.branches")
     */
    public function branches($project, BitBucketRepository $bitBucket, GitHubRepository $gitHub)
    {
        $Project = Project::whereSlug($project)->first();

        switch ($Project->type()) {
            case 'bitbucket':
                $branches = $this->versionControl->getBranches($bitBucket, $Project->repository);
                break;

            case 'github':
                $branches = $this->versionControl->getBranches($gitHub, $Project->repository);
                break;
        }

        return view('pages.deploy.ajax.branches', [
            'pagination' => [
                'previous' => Request::get('page', 1) - 1,
                'next' => Request::get('page', 1) + 1,
            ],
            'records' => $branches,
            'project' => $project,
        ]);
    }

    /**
     * @Get("deploy/environments/{project}/{branch}/{commit}", as="deploy.ajax.environments")
     */
    public function environments($project, $branch, $commit)
    {
        $Project = Project::whereSlug($project)->first();

        return view('pages.deploy.ajax.environments', [
            'records' => $Project->environments()->simplePaginate(10),
            'project' => $project,
            'commit' => $commit,
            'branch' => $branch,
        ]);
    }

    /**
     * @Get("deploy/make/{project}/{branch}/{commit}/{environment}", as="deploy.ajax.make")
     */
    public function make($project, $branch, $commit, $environment)
    {
        return view('pages.deploy.ajax.make', [
            'environment' => $environment,
            'project' => $project,
            'commit' => $commit,
            'branch' => $branch,
        ]);
    }

}
