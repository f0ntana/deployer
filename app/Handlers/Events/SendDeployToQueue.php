<?php namespace App\Handlers\Events;

use App\Events\DeployWasCreated;

class SendDeployToQueue
{

    public function __construct()
    {
    }

    public function handle(DeployWasCreated $event)
    {
        dd($event->deploy);
    }

}
