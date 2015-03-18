<?php namespace App\Http\Controllers\Deploy;

use App\Http\Controllers\Controller;
use App\Models\Environment;
use App\Models\Project;
use App\Services\Db\Deploys\CreateDeployService;

/**
 * @Middleware("auth")
 */
class HomeController extends Controller
{
    protected $title = 'Deploy';

    /**
     * @Get("/deploy", as="deploy.home")
     */
    public function index()
    {
        $Projects = Project::orderBy('name')->get();

        return view('layouts.page', [
            'contents' => [
                view('pages.deploy.index', [
                    'records' => $Projects
                ])
            ]
        ]);
    }

    /**
     * @Get("/deploy/execute/{project}/{branch}/{commit}/{environment}", as="deploy.execute")
     *
     * @param $project
     * @param $branch
     * @param $commit
     * @param $environment
     * @param CreateDeployService $Service
     *
     * @return \Illuminate\View\View
     */
    public function execute($project, $branch, $commit, $environment, CreateDeployService $Service)
    {
        $Environment = Environment::whereSlug($environment)->first();
        $Project = Project::whereSlug($project)->first();

        $Created = $Service->execute([
            'environment_id' => $Environment->id,
            'project_id' => $Project->id,
            'commit' => $commit,
            'branch' => $branch,
        ]);

        if ($Created) {
            $output = view('pages.deploy.success');
        } else {
            $output = view('pages.deploy.error');
        }

        return view('layouts.page', [
            'contents' => [
                $output
            ]
        ]);
    }

    /**
     * @Get("/deploy/password/{project}/{branch}/{commit}/{environment}", as="deploy.password")
     *
     * @param $project
     * @param $branch
     * @param $commit
     * @param $environment
     * @param CreateDeployService $Service
     *
     * @return \Illuminate\View\View
     */
    public function password($project, $branch, $commit, $environment, CreateDeployService $Service)
    {
        return view('layouts.page', [
            'contents' => [
                view('pages.deploy.password', [
                    'environment' => $environment,
                    'project' => $project,
                    'branch' => $branch,
                    'commit' => $commit,
                ])
            ]
        ]);
    }

}
