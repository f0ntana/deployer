<?php namespace App\Events;

use Illuminate\Queue\SerializesModels;

class DeployWasCreated extends Event
{

    use SerializesModels;

    public $id;

    public function __construct($id)
    {
        $this->id = $id;
    }

}
