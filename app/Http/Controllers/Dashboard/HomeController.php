<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\AclService;

/**
 * @Middleware("auth")
 */
class HomeController extends Controller
{
    protected $title = 'Dashboard';

    /**
     * @Get("/", as="dashboard")
     */
    public function index()
    {
        dd(AclService::hasPermission('system.roles.index'));

        return view('layouts.page');
    }

}
