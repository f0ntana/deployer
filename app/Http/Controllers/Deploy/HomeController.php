<?php namespace App\Http\Controllers\Deploy;

use App\Http\Controllers\Controller;
use App\Models\Project;

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

}
