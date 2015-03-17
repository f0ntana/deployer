<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Deploy;
use App\Models\Environment;
use App\Models\Project;

/**
 * @Middleware("auth")
 */
class HomeController extends Controller
{
    protected $title = 'Dashboard';

    /**
     * @Get("/", as="dashboard")
     */
    public function index()
    {
        $Environments = Environment::orderBy('name')->get();

        return view('layouts.page', [
            'contents' => [
                view('pages.dashboard.index', [
                    'environments' => $Environments
                ])
            ]
        ]);
    }

    /**
     * @Get("/dashboard/projects", as="dashboard.projects")
     */
    public function projects()
    {
        $Projects = Project::orderBy('name')->simplePaginate(10);

        return view('pages.dashboard.ajax.projects', [
            'records' => $Projects
        ]);
    }

    /**
     * @Get("/dashboard/environments/{project}", as="dashboard.environments")
     */
    public function environments($project)
    {
        $Project = Project::whereSlug($project)->first();

        return view('pages.dashboard.ajax.environments', [
            'records' => $Project->environments,
            'project' => $project
        ]);
    }

    /**
     * @Get("/dashboard/deploys/{project}/{environment}", as="dashboard.deploys")
     */
    public function deploys($project, $environment)
    {
        $Environment = Environment::whereSlug($environment)->first();
        $Project = Project::whereSlug($project)->first();

        $Deploys = Deploy::whereProjectId($Project->id)->whereEnvironmentId($Environment->id)->skip(1)->orderBy('created_at', 'desc')->simplePaginate(10);

        return view('pages.dashboard.ajax.deploys', [
            'environment' => $environment,
            'records' => $Deploys,
            'project' => $project
        ]);
    }

}
