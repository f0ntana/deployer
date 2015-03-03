<?php namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\System\Actions\RoleRequest;
use App\Models\Role;
use App\Services\Db\RoleService;
use App\Services\Db\service;

/**
 * @Resource("system/actions")
 * @Middleware("auth")
 */
class ActionsController extends Controller
{
    protected $title = 'Ações';

    protected $actions = [
        'system.actions.index' => [
            [
                'label' => 'Adicionar',
                'route' => 'system.actions.create',
                'icon' => 'fa-plus',
                'btn' => 'btn-primary'
            ]
        ],
        'system.actions.create' => [
            [
                'label' => 'Voltar',
                'route' => 'system.actions.index',
                'icon' => 'fa-arrow-left',
                'btn' => 'btn-default'
            ]
        ],
        'system.actions.edit' => [
            [
                'label' => 'Voltar',
                'route' => 'system.actions.index',
                'icon' => 'fa-arrow-left',
                'btn' => 'btn-default'
            ]
        ]
    ];

    /**
     * @var
     */
    private $service;

    /**
     * Constructor class
     *
     * @param RoleService $service
     */
    public function __construct(RoleService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $List = Role::paginate($this->recordsPerPage);

        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => 'Lista de Ações',
                    'class' => 'panel-default',
                    'nobody' => view('pages.system.actions.index', [
                        'records' => $List
                    ]),
                ])
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => 'Criar Ação',
                    'class' => 'panel-default',
                    'body' => view('pages.system.actions.create'),
                ])
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     * @return Response
     */
    public function store(RoleRequest $request)
    {
        $Role = $this->service->create([
            'action_id' => $request->get('action_id', null),
            'name' => $request->get('name')
        ]);

        if ($Role) {
            return $this->toRoute('system.actions.index', "Registro criado com sucesso", 'success');
        } else {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors(["Não foi possível criar o registro."]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $Role = Role::find($id);

        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => "Alteração de Ação: {$Role->name}",
                    'class' => 'panel-default',
                    'body' => view('pages.system.actions.edit', [
                        'record' => $Role
                    ]),
                ])
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param RoleRequest $request
     * @return Response
     */
    public function update($id, RoleRequest $request)
    {
        $Role = $this->service->update([
            'action_id' => $request->get('action_id', null),
            'name' => $request->get('name')
        ], $id);

        if ($Role) {
            return $this->toRoute('system.actions.index', "Registro alterado com sucesso", 'success');
        } else {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors(["Não foi possível criar o registro."]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->service->remove($id)) {
            return $this->toRoute('system.actions.index', "Registro removido com sucesso", 'success');
        } else {
            return $this->toRoute('system.actions.index', "Não foi possível remover o registro.", 'error');
        }
    }

}
