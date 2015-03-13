<?php namespace App\Commands;

use Illuminate\Contracts\Queue\ShouldBeQueued;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ExecuteDeploy extends Command implements ShouldBeQueued
{

    use InteractsWithQueue, SerializesModels;

    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

}
