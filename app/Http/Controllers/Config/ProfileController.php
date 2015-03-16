<?php namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Services\Db\Projects\AttachPermissionsService;
use Request;

/**
 * @Middleware("auth")
 */
class ProfileController extends Controller
{
    protected $title = 'Meus Dados';

    protected $actions = [];

    /**
     * @Get("profile", as="")
     */
    public function index()
    {
        return view('layouts.page', [
            'contents' => [
                view('bs.panel', [
                    'title' => 'Configurações',
                    'class' => 'panel-default',
                    'body' => view('pages.config.profile.index'),
                ])
            ],
        ]);
    }

}
