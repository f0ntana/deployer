<?php namespace App\Http\Controllers\Deploy;

use App\Http\Controllers\Controller;
use App\Models\Environment;
use App\Models\Project;
use Session;

/**
 *
 */
class AjaxController extends Controller
{

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
    public function branches($project)
    {
        Session::put('deploy.project', $project);

        $Projects = Project::orderBy('name')->simplePaginate(5);

        return view('pages.deploy.ajax.branches', [
            'records' => $Projects,
            'project' => $project,
        ]);
    }

    /**
     * @Get("deploy/environments/{project}/{branch}", as="deploy.ajax.environments")
     */
    public function environments($project, $branch)
    {
        $Environments = Environment::orderBy('name')->simplePaginate(5);

        return view('pages.deploy.ajax.environments', [
            'records' => $Environments,
            'project' => $project,
            'branch' => $branch,
        ]);
    }

    /**
     * @Get("deploy/make/{project}/{branch}/{environment}", as="deploy.ajax.make")
     */
    public function make($project, $branch, $environment)
    {
        return view('pages.deploy.ajax.make', [
            'environment' => $environment,
            'project' => $project,
            'branch' => $branch,
        ]);
    }

}
