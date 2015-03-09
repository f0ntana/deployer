<?php namespace App\Http\Controllers\Deploy;

use App\Http\Controllers\Controller;

/**
 * @Middleware("auth")
 */
class HomeController extends Controller
{
    protected $title = 'Deploy';

    /**
     * @Get("/deploy", as="deploy.home")
     */
    public function index()
    {
        return view('layouts.page', [
            'contents' => [
                view('pages.deploy.index')
            ]
        ]);
    }

}
