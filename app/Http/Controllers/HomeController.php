<?php namespace App\Http\Controllers;

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
