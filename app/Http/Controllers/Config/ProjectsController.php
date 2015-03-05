<?php namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Config\Projects\ProjectRequest;
use App\Models\Project;
use App\Services\Db\Projects\AttachPermissionsService;
use App\Services\Db\Projects\CreateProjectService;
use App\Services\Db\Projects\DeleteProjectService;
use App\Services\Db\Projects\UpdateProjectService;
use Request;

/**
 * @Resource("config/projects")
 * @Middleware("auth")
 */
class ProjectsController extends Controller
{
    protected $title = 'Projetos';

    protected $actions = [
        'config.projects.index' => [
            [
                'label' => 'Adicionar',
                'route' => 'config.projects.create',
                'icon' => 'fa-plus',
                'btn' => 'btn-primary'
            ]
        ],
        'config.projects.create' => [
            [
                'label' => 'Voltar',
                'route' => 'config.projects.index',
                'icon' => 'fa-arrow-left',
                'btn' => 'btn-default'
            ]
        ],
        'config.projects.edit' => [
            [
                'label' => 'Voltar',
                'route' => 'config.projects.index',
                'icon' => 'fa-arrow-left',
                'btn' => 'btn-default'
            ]
        ]
    ];

    public function index()
    {
        $List = Project::paginate(10);

        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => 'Lista de Projetos',
                    'class' => 'panel-default',
                    'nobody' => view('pages.config.projects.index', [
                        'records' => $List
                    ]),
                ])
            ],
        ]);
    }

    public function create()
    {
        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => 'Criar Projeto',
                    'class' => 'panel-default',
                    'body' => view('pages.config.projects.create'),
                ])
            ],
        ]);
    }

    public function store(ProjectRequest $request, CreateProjectService $create)
    {
        if ($create->execute($request->all())) {
            return $this->toRoute('config.projects.index', "Registro criado com sucesso", 'success');
        } else {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors(["Não foi possível criar o registro."]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Project = Project::find($id);

        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => "Alteração de Projeto: {$Project->name}",
                    'class' => 'panel-default',
                    'body' => view('pages.config.projects.edit', [
                        'record' => $Project
                    ]),
                ])
            ],
        ]);
    }

    public function update($id, ProjectRequest $request, UpdateProjectService $update)
    {
        $Project = $update->execute($request->all(), $id);

        if ($Project) {
            return $this->toRoute('config.projects.index', "Registro alterado com sucesso", 'success');
        } else {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors(["Não foi possível criar o registro."]);
        }
    }

    public function destroy($id, DeleteProjectService $delete)
    {
        if ($delete->execute($id)) {
            return $this->toRoute('config.projects.index', "Registro removido com sucesso", 'success');
        } else {
            return $this->toRoute('config.projects.index', "Não foi possível remover o registro.", 'error');
        }
    }

}