<?php namespace App\Services\Utils\Envoy;

use Log;

class ExecuteService
{

    /**
     * @var DeleteService
     */
    private $delete;

    public function __construct(DeleteService $delete)
    {
        $this->delete = $delete;
    }

    public function fire($folder)
    {
        $command = "cd {$folder} && envoy run deploy";

        Log::info($command);

        $this->delete->fire($folder);
    }

}