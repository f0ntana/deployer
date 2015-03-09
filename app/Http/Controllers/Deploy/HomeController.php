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
        $panel2 = view('bs.panel', [
            'title' => "Panel 2",
            'class' => 'panel-default',
            'body' => "TESTE 2"
        ]);

        $panel3 = view('bs.panel', [
            'title' => "Panel 3",
            'class' => 'panel-default',
            'body' => "TESTE 3"
        ]);

        return view('layouts.page', [
            'contents' => [
                view('bs.row', [
                    'cols' => [
                        $this->getProjectList(),
                        $this->getBranchList(),
                        $this->getEnvironmentList()
                    ]
                ])
            ]
        ]);
    }

    private function getProjectList()
    {
        $Projects = Project::all();

        return view('bs.col', [
            'col' => 4,
            'body' => view('bs.panel', [
                'title' => "Selecione o Projeto",
                'class' => 'panel-default',
                'nobody' => view('pages.deploy.projects', [
                    'projects' => $Projects
                ])
            ])
        ]);
    }

    private function getBranchList()
    {
        return view('bs.col', [
            'col' => 4,
            'body' => view('bs.panel', [
                'title' => "Selecione a Branch",
                'class' => 'panel-default',
                'body' => "TESTE 1"
            ])
        ]);
    }

    private function getEnvironmentList()
    {
        return view('bs.col', [
            'col' => 4,
            'body' => view('bs.panel', [
                'title' => "Selecione o Ambiente",
                'class' => 'panel-default',
                'body' => "TESTE 1"
            ])
        ]);
    }

}
