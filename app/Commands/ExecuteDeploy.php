<?php namespace App\Commands;

// class ExecuteDeploy extends Command implements ShouldBeQueued
class ExecuteDeploy extends Command
{

    // use InteractsWithQueue, SerializesModels;

    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

}
