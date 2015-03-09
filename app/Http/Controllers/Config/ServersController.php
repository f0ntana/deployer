<?php namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Config\Servers\ServerRequest;
use App\Models\Server;
use App\Services\Db\Servers\AttachPermissionsService;
use App\Services\Db\Servers\CreateServerService;
use App\Services\Db\Servers\DeleteServerService;
use App\Services\Db\Servers\UpdateServerService;
use Request;

/**
 * @Resource("config/servers")
 * @Middleware("auth")
 */
class ServersController extends Controller
{
    protected $title = 'Servidores';

    protected $actions = [
        'config.servers.index' => [
            [
                'label' => 'Adicionar',
                'route' => 'config.servers.create',
                'icon' => 'fa-plus',
                'btn' => 'btn-primary'
            ]
        ],
        'config.servers.create' => [
            [
                'label' => 'Voltar',
                'route' => 'config.servers.index',
                'icon' => 'fa-arrow-left',
                'btn' => 'btn-default'
            ]
        ],
        'config.servers.edit' => [
            [
                'label' => 'Voltar',
                'route' => 'config.servers.index',
                'icon' => 'fa-arrow-left',
                'btn' => 'btn-default'
            ]
        ]
    ];

    public function index()
    {
        $List = Server::paginate(10);

        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => 'Lista de Servidores',
                    'class' => 'panel-default',
                    'nobody' => view('pages.config.servers.index', [
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
                    'title' => 'Criar Servidor',
                    'class' => 'panel-default',
                    'body' => view('pages.config.servers.create'),
                ])
            ],
        ]);
    }

    public function store(ServerRequest $request, CreateServerService $create)
    {
        $Server = $create->execute($request->all());

        if ($Server) {
            return $this->toRoute('config.servers.index', "Registro criado com sucesso", 'success');
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
        $Server = Server::find($id);
        dd($Server->environments);

        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => "Alteração de Servidor: {$Server->name}",
                    'class' => 'panel-default',
                    'body' => view('pages.config.servers.edit', [
                        'record' => $Server
                    ]),
                ])
            ],
        ]);
    }

    public function update($id, ServerRequest $request, UpdateServerService $update)
    {
        $Server = $update->execute($request->all(), $id);

        if ($Server) {
            return $this->toRoute('config.servers.index', "Registro alterado com sucesso", 'success');
        } else {
            return redirect()->back()->withInput($request->all())->withErrors(["Não foi possível criar o registro."]);
        }
    }

    public function destroy($id, DeleteServerService $delete)
    {
        if ($delete->execute($id)) {
            return $this->toRoute('config.servers.index', "Registro removido com sucesso", 'success');
        } else {
            return $this->toRoute('config.servers.index', "Não foi possível remover o registro.", 'error');
        }
    }

}
