<?php namespace App\Services\Utils\Envoy;

class ExecuteService
{

    public function fire($folder)
    {
        $command = "cd {$folder} && envoy run deploy";
        dd($command);

        // exec($command_deploy , $outputs_deploy, $ret_deploy);
    }

}