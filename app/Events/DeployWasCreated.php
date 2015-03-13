<?php namespace App\Events;

use Illuminate\Queue\SerializesModels;

class DeployWasCreated extends Event
{

    use SerializesModels;

    public $deploy;

    public function __construct($deploy)
    {
        $this->deploy = $deploy;
    }

}
