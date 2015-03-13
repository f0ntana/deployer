<?php namespace App\Handlers\Events;

use App\Commands\ExecuteDeploy;
use App\Events\DeployWasCreated;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Queue;

class SendDeployToQueue
{

    use DispatchesCommands;

    public function handle(DeployWasCreated $event)
    {
        $this->dispatch(new ExecuteDeploy($event->deploy));
    }

}
