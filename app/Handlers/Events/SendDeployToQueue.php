<?php namespace App\Handlers\Events;

use App\Events\DeployWasCreated;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Queue;

class SendDeployToQueue
{

    use DispatchesCommands;

    public function __construct()
    {
    }

    public function handle(DeployWasCreated $event)
    {
        $this->dispatchFromArray('App\Commands\ExecuteDeploy', [
            'id' => $event->deploy
        ]);
    }

}
