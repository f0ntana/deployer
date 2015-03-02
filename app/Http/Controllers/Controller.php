<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Route;
use View;

abstract class Controller extends BaseController
{

    use DispatchesCommands, ValidatesRequests;

    /**
     * Title of the page
     *
     * @var $title
     */
    protected $title;

    /**
     * Actions of the page
     *
     * @var $actions
     */
    protected $actions = [];

    /**
     * Route name
     *
     * @var $route
     */
    protected $route;

    /**
     * New instance of Controller
     */
    public function __construct()
    {
        $this->route = $this->getRoute();

        View::share('page', [
            'title' => $this->title,
            'actions' => $this->getRouteActions(),
        ]);
    }

    /**
     * Get current route name
     *
     * @return string
     */
    private function getRoute()
    {
        return Route::getCurrentRoute()->getName();
    }

    /**
     * Get current route actions
     *
     * @return string
     */
    private function getRouteActions()
    {
        if (array_key_exists($this->route, $this->actions)) {
            if (count($this->actions[$this->route])) {
                return $this->actions[$this->route];
            }
        }

        return false;
    }

}
