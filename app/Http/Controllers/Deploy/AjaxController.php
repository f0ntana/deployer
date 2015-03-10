<?php namespace App\Http\Controllers\Deploy;

use App\Http\Controllers\Controller;
use App\Models\Project;

/**
 *
 */
class AjaxController extends Controller
{

    /**
     * @Get("deploy/projects", as="deploy.home.projects")
     */
    public function projects()
    {
        $Projects = Project::orderBy('name')->simplePaginate(5);

        return view('pages.deploy.ajax.projects', [
            'records' => $Projects
        ]);
    }

}
