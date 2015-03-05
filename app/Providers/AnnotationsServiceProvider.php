<?php namespace App\Providers;

use Collective\Annotations\AnnotationsServiceProvider as ServiceProvider;

class AnnotationsServiceProvider extends ServiceProvider
{

    /**
     * The classes to scan for event annotations.
     *
     * @var array
     */
    protected $scanEvents = [];

    /**
     * The classes to scan for route annotations.
     *
     * @var array
     */
    protected $scanRoutes = [
        'App\Http\Controllers\Auth\AuthController',
        'App\Http\Controllers\HomeController',
        /**
         * System Module Routes
         */
        'App\Http\Controllers\System\RolesController',
        'App\Http\Controllers\System\ActionsController',
        'App\Http\Controllers\System\PermissionsController',
    ];

    /**
     * Determines if we will auto-scan in the local environment.
     *
     * @var bool
     */
    protected $scanWhenLocal = true;

}