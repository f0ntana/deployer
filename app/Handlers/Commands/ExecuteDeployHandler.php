<?php namespace App\Handlers\Commands;

use App\Commands\ExecuteDeploy;
use App\Models\Deploy;
use App\Services\Utils\EnvoyService;
use File;

class ExecuteDeployHandler
{

    private $deploy;
    private $envoyService;

    public function __construct(Deploy $deploy, EnvoyService $envoyService)
    {
        $this->envoyService = $envoyService;
        $this->deploy = $deploy;
    }

    public function handle(ExecuteDeploy $command)
    {
        try {
            $Deploy = $this->deploy->find($command->id);

            if ($Deploy) {
                $envoy = $this->envoyService->build($Deploy);
            } else {
                $command->delete();
                return false;
            }

            return true;
        } catch (\Exception $e) {
            return false;
        }
    }

}

