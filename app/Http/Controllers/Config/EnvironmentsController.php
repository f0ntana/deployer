<?php namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Config\Environments\EnvironmentRequest;
use App\Models\Environment;
use App\Models\Server;
use App\Services\Db\Environments\AttachPermissionsService;
use App\Services\Db\Environments\AttachServerService;
use App\Services\Db\Environments\CreateEnvironmentService;
use App\Services\Db\Environments\DeleteEnvironmentService;
use App\Services\Db\Environments\UpdateEnvironmentService;
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
        $Environment = $create->execute($request->all());

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
                        'record' => $Environment
                    ]),
                ])
            ],
        ]);
    }

    public function update($id, EnvironmentRequest $request, UpdateEnvironmentService $update)
    {
        $Environment = $update->execute($request->all(), $id);

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

    /**
     * @Get("config/environments/{id}/servers", as="config.environments.servers")
     *
     * @param $id
     * @return mixed
     */
    public function servers($id)
    {
        $Environment = Environment::find($id);

        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => "Lista de servidores do ambiente: {$Environment->name}",
                    'class' => 'panel-default',
                    'nobody' => view('pages.config.environments.servers', [
                        'servers' => Server::all(),
                        'record' => $Environment
                    ]),
                ])
            ],
        ]);
    }

    /**
     * @Post("config/environments/{id}/servers", as="config.environments.servers.save")
     *
     * @param $id
     * @return mixed
     */
    public function bindServers($id, AttachServerService $service)
    {
        $Environment = Environment::find($id);

        if ($service->execute($Environment, Request::get('server'))) {
            return $this->toRoute('config.environments.index', "Servidores relacionados com sucesso!", 'success');
        } else {
            return $this->toRoute('config.environments.index', "Não foi possível relacionar os servidores.", 'error');
        }
    }

}
