<?php namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Config\Environments\EnvironmentRequest;
use App\Models\Environment;
use App\Services\Db\Environments\AttachPermissionsService;
use App\Services\Db\Environments\CreateEnvironmentService;
use App\Services\Db\Environments\DeleteEnvironmentService;
use App\Services\Db\Environments\UpdateEnvironmentService;
use App\Services\Utils\GetRecursiveDbList;
use Request;

/**
 * @Resource("config/environments")
 * @Middleware("auth")
 */
class EnvironmentsController extends Controller
{
    protected $title = 'Ambientes';

    protected $actions = [
        'config.environments.index' => [
            [
                'label' => 'Adicionar',
                'route' => 'config.environments.create',
                'icon' => 'fa-plus',
                'btn' => 'btn-primary'
            ]
        ],
        'config.environments.create' => [
            [
                'label' => 'Voltar',
                'route' => 'config.environments.index',
                'icon' => 'fa-arrow-left',
                'btn' => 'btn-default'
            ]
        ],
        'config.environments.edit' => [
            [
                'label' => 'Voltar',
                'route' => 'config.environments.index',
                'icon' => 'fa-arrow-left',
                'btn' => 'btn-default'
            ]
        ]
    ];

    public function index()
    {
        $List = Environment::paginate(10);

        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => 'Lista de Ambientes',
                    'class' => 'panel-default',
                    'nobody' => view('pages.config.environments.index', [
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
                    'title' => 'Criar Ambiente',
                    'class' => 'panel-default',
                    'body' => view('pages.config.environments.create'),
                ])
            ],
        ]);
    }

    public function store(EnvironmentRequest $request, CreateEnvironmentService $create)
    {
        $Environment = $create->execute([
            'environment_id' => $request->get('environment_id', null),
            'name' => $request->get('name')
        ]);

        if ($Environment) {
            return $this->toRoute('config.environments.index', "Registro criado com sucesso", 'success');
        } else {
            return redirect()->back()->withInput($request->all())->withErrors(["Não foi possível criar o registro."]);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $Environment = Environment::find($id);

        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => "Alteração de Ambiente: {$Environment->name}",
                    'class' => 'panel-default',
                    'body' => view('pages.config.environments.edit', [
                        'environments' => GetRecursiveDbList::pairs('environments', 'id', 'name', 'environment_id', null, 1, true),
                        'record' => $Environment
                    ]),
                ])
            ],
        ]);
    }

    public function update($id, EnvironmentRequest $request, UpdateEnvironmentService $update)
    {
        $Environment = $update->execute([
            'environment_id' => $request->get('environment_id', null),
            'name' => $request->get('name')
        ], $id);

        if ($Environment) {
            return $this->toRoute('config.environments.index', "Registro alterado com sucesso", 'success');
        } else {
            return redirect()->back()->withInput($request->all())->withErrors(["Não foi possível criar o registro."]);
        }
    }

    public function destroy($id, DeleteEnvironmentService $delete)
    {
        if ($delete->execute($id)) {
            return $this->toRoute('config.environments.index', "Registro removido com sucesso", 'success');
        } else {
            return $this->toRoute('config.environments.index', "Não foi possível remover o registro.", 'error');
        }
    }

}
