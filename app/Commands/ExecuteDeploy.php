<?php namespace App\Commands;

use App\Services\Utils\Envoy\MakeService;
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

        $this->attempts(3);
    }

    public function handle(MakeService $makeService)
    {
        if ($this->deploy) {
            $deployed = $makeService->fire($this->deploy);

            if ($deployed) {
                $this->delete();
                return true;
            }
        }

        return false;
    }

}
