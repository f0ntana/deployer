<?php namespace App\Services\Db\Servers;

use App\Models\Server;
use Validator;

class UpdateServerService extends ServerService
{

    public function execute(array $data, $id)
    {
        $Server = Server::find($id);
        $Server->role_id = $data['role_id'];
        $Server->name = $data['name'];

        return $Server->save();
    }

}
