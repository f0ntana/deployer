<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;

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
        return view('layouts.page');
    }

}
