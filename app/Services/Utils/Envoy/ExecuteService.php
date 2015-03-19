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
        exec("cd {$folder} && envoy run deploy", $outputs, $ret);
        $this->delete->fire($folder);

        return true;
    }

}