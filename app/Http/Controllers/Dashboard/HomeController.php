<?php namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Environment;

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
        $Environments = Environment::orderBy('name')->get();

        return view('layouts.page', [
            'contents' => [
                view('pages.dashboard.index', [
                    'environments' => $Environments
                ])
            ]
        ]);
    }

}
