<?php namespace App\Http\Controllers\Deploy;

use App\Http\Controllers\Controller;
use App\Models\Environment;
use App\Models\Project;
use App\Services\Db\Deploys\CreateDeployService;
use Request;

/**
 * @Middleware("auth")
 */
class HomeController extends Controller
{
    protected $title = 'Deploy';

    /**
     * @Get("/deploy", as="deploy.home")
     */
    public function getIndex()
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
     */
    public function getExecute($project, $branch, $commit, $environment, CreateDeployService $Service)
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
     */
    public function getPassword($project, $branch, $commit, $environment)
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

    /**
     * @Post("/deploy/password/{project}/{branch}/{commit}/{environment}", as="deploy.password.post")
     */
    public function postPassword($project, $branch, $commit, $environment, CreateDeployService $Service)
    {
        $password = Request::get('password');

        if ($password == '') {
            return redirect()->back()->withInput(Request::all())->withErrors(["É necessário informar uma senha!"]);
        } else {
            $Environment = Environment::whereSlug($environment)->first();

            if ($Environment->password != $password) {
                return redirect()->back()->withInput(Request::all())->withErrors(["A senha informada está incorreta!"]);
            } else {
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
        }
    }

}
