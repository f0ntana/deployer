<?php namespace App\Commands;

use App\Services\Utils\Envoy\MakeService;
use App\Services\Utils\EnvoyService;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExecuteDeploy extends Command implements SelfHandling, ShouldBeQueued
{
    use InteractsWithQueue, SerializesModels;

    private $deploy;

    public function __construct($deploy)
    {
        $this->deploy = $deploy;
    }

    public function handle(MakeService $makeService)
    {
        if ($this->deploy) {
            $makeService->fire($this->deploy);
        } else {
            $this->delete();
            return false;
        }

        return true;
    }

}
