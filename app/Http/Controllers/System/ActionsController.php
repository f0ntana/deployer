<?php namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\System\Actions\ActionRequest;
use App\Models\Action;
use App\Services\Db\Actions\CreateActionService;
use App\Services\Db\Actions\DeleteActionService;
use App\Services\Db\Actions\UpdateActionService;
use App\Services\Db\ActionService;
use App\Services\Utils\GetRecursiveDbList;

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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $List = GetRecursiveDbList::pairs('actions', 'id', 'name', 'action_id', null);

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
                    'body' => view('pages.system.actions.create', [
                        'actions' => GetRecursiveDbList::pairs('actions', 'id', 'name', 'action_id', null, 1)
                    ]),
                ])
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ActionRequest $request
     * @param CreateActionService $create
     *
     * @return Response
     */
    public function store(ActionRequest $request, CreateActionService $create)
    {
        $Action = $create->execute($request->all());

        if ($Action) {
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
        $Action = Action::find($id);

        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => "Alteração de Ação: {$Action->name}",
                    'class' => 'panel-default',
                    'body' => view('pages.system.actions.edit', [
                        'actions' => GetRecursiveDbList::pairs('actions', 'id', 'name', 'action_id', null, 1),
                        'record' => $Action
                    ]),
                ])
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param ActionRequest $request
     * @param UpdateActionService $update
     *
     * @return Response
     */
    public function update($id, ActionRequest $request, UpdateActionService $update)
    {
        $Action = $update->execute($request->all(), $id);

        if ($Action) {
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
     * @param DeleteActionService $delete
     *
     * @return Response
     */
    public function destroy($id, DeleteActionService $delete)
    {
        if ($delete->execute($id)) {
            return $this->toRoute('system.actions.index', "Registro removido com sucesso", 'success');
        } else {
            return $this->toRoute('system.actions.index', "Não foi possível remover o registro.", 'error');
        }
    }

}
