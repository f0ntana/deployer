<?php namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\System\Roles\RoleRequest;
use App\Models\Role;
use App\Services\Db\Roles\CreateRoleService;
use App\Services\Db\Roles\DeleteRoleService;
use App\Services\Db\Roles\UpdateRoleService;
use App\Services\Utils\GetRecursiveDbList;

/**
 * @Resource("system/roles")
 * @Middleware("auth")
 */
class RolesController extends Controller
{
    protected $title = 'Perfis';

    protected $actions = [
        'system.roles.index' => [
            [
                'label' => 'Adicionar',
                'route' => 'system.roles.create',
                'icon' => 'fa-plus',
                'btn' => 'btn-primary'
            ]
        ],
        'system.roles.create' => [
            [
                'label' => 'Voltar',
                'route' => 'system.roles.index',
                'icon' => 'fa-arrow-left',
                'btn' => 'btn-default'
            ]
        ],
        'system.roles.edit' => [
            [
                'label' => 'Voltar',
                'route' => 'system.roles.index',
                'icon' => 'fa-arrow-left',
                'btn' => 'btn-default'
            ]
        ]
    ];

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $List = GetRecursiveDbList::pairs('roles', 'id', 'name', 'role_id', null, 1);

        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => 'Lista de Perfis',
                    'class' => 'panel-default',
                    'nobody' => view('pages.system.roles.index', [
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
                    'title' => 'Criar Perfil',
                    'class' => 'panel-default',
                    'body' => view('pages.system.roles.create', [
                        'roles' => GetRecursiveDbList::pairs('roles', 'id', 'name', 'role_id', null, 1, true)
                    ]),
                ])
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RoleRequest $request
     * @param CreateRoleService $create
     *
     * @return Response
     */
    public function store(RoleRequest $request, CreateRoleService $create)
    {
        $Role = $create->execute([
            'role_id' => $request->get('role_id', null),
            'name' => $request->get('name')
        ]);

        if ($Role) {
            return $this->toRoute('system.roles.index', "Registro criado com sucesso", 'success');
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
                    'title' => "Alteração de Perfil: {$Role->name}",
                    'class' => 'panel-default',
                    'body' => view('pages.system.roles.edit', [
                        'roles' => GetRecursiveDbList::pairs('roles', 'id', 'name', 'role_id', null, 1, true),
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
     * @param UpdateRoleService $update
     *
     * @return Response
     */
    public function update($id, RoleRequest $request, UpdateRoleService $update)
    {
        $Role = $update->execute([
            'role_id' => $request->get('role_id', null),
            'name' => $request->get('name')
        ], $id);

        if ($Role) {
            return $this->toRoute('system.roles.index', "Registro alterado com sucesso", 'success');
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
     * @param DeleteRoleService $delete
     *
     * @return Response
     */
    public function destroy($id, DeleteRoleService $delete)
    {
        if ($delete->execute($id)) {
            return $this->toRoute('system.roles.index', "Registro removido com sucesso", 'success');
        } else {
            return $this->toRoute('system.roles.index', "Não foi possível remover o registro.", 'error');
        }
    }

}
