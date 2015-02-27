<?php namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Http\Requests;

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
        return view('layouts.page', [
            'contents' => [
                view('bootstrap.panel', [
                    'title' => 'Lista de Perfis',
                    'class' => 'panel-default',
                    'body' => view('pages.system.roles.index'),
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
        return view('layouts.page');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
        //
    }

}
