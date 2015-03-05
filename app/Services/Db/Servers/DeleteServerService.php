<?php namespace App\Services\Db\Servers;

use App\Models\Server;
use Validator;

class DeleteServerService extends ServerService
{

    public function execute($id)
    {
        $Server = Server::find($id);

        if ($Server->delete()) {
            return true;
        }

        return false;
    }

}
