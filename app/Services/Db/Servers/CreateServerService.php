<?php namespace App\Services\Db\Servers;

use App\Models\Server;
use Validator;

class CreateServerService extends ServerService
{

    public function execute(array $data)
    {
        return Server::create([
            'name' => $data['name'],
        ]);
    }

}
