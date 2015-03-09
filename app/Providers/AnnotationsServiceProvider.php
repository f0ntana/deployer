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
        /**
         * Auth Module Routes
         */
        'App\Http\Controllers\Auth\AuthController',
        /**
         * Dashboard Module Routes
         */
        'App\Http\Controllers\Dashboard\HomeController',

        /**
         * System Module Routes
         */
        'App\Http\Controllers\System\RolesController',
        'App\Http\Controllers\System\ActionsController',
        'App\Http\Controllers\System\PermissionsController',
        /**
         * Config Module Routes
         */
        'App\Http\Controllers\Config\ServersController',
        'App\Http\Controllers\Config\ProjectsController',
        'App\Http\Controllers\Config\EnvironmentsController',
    ];

    /**
     * Determines if we will auto-scan in the local environment.
     *
     * @var bool
     */
    protected $scanWhenLocal = true;

}