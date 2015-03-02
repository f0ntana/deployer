<?php namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\System\Roles\RoleRequest;
use App\Models\Role;

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
        $List = Role::paginate($this->recordsPerPage);

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
                    'body' => view('pages.system.roles.create'),
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
        $Role = new Role();
        $Role->name = $request->get('name');

        if ($request->get('role_id')) {
            $Role->role_id = $request->get('role_id');
        }

        if ($Role->save()) {
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        return $this->toRoute('system.roles.index', "Registro removido com sucesso", 'success');
    }

}
