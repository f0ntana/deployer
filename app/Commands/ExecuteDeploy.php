<?php namespace App\Commands;

use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExecuteDeploy extends Command implements ShouldBeQueued
{

    use InteractsWithQueue, SerializesModels;

    public $deploy;

    public function __construct($deploy)
    {
        $this->deploy = $deploy;
    }

}
