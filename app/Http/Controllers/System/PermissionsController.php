<?php namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Role;
use App\Services\Db\Permissions\AttachService;
use App\Services\Utils\GetRecursiveDbList;
use Request;

/**
 * @Middleware("auth")
 */
class PermissionsController extends Controller
{
    protected $title = 'Permissões';

    protected $actions = [
        'system.permissions.get' => [
            [
                'label' => 'Voltar',
                'route' => 'system.roles.index',
                'icon' => 'fa-arrow-left',
                'btn' => 'btn-default'
            ]
        ],
    ];

    /**
     * @Get("system/permissions/{id}", as="system.permissions.get")
     */
    public function permissions($id)
    {
        $Role = Role::find($id);

        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => "Lista de permissões do perfil: {$Role->name}",
                    'class' => 'panel-default',
                    'nobody' => view('pages.system.permissions.index', [
                        'actions' => GetRecursiveDbList::pairs('actions', 'id', 'name', 'action_id', null, 1, false),
                        'record' => $Role
                    ]),
                ])
            ],
        ]);
    }

    /**
     * @Post("system/permissions/{id}", as="system.permissions.post")
     *
     * @param $id
     * @param AttachService $service
     */
    public function savePermissions($id, AttachService $service)
    {
        $attached = $service->execute(Role::find($id), Request::get('permissions'));

        if ($attached) {
            return $this->toRoute('system.roles.index', "Permissões alteradas com sucesso.", 'success');
        } else {
            return $this->toRoute('system.roles.index', "Não foi possível alterar as as permissões.", 'error');
        }
    }

}
