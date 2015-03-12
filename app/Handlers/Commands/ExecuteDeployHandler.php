<?php namespace App\Handlers\Commands;

use App\Commands\ExecuteDeploy;
use Log;

class ExecuteDeployHandler
{

    public function handle(ExecuteDeploy $command)
    {
        Log::info("COMMAND EXECUTE DEPLOY");

        return true;
    }

}
