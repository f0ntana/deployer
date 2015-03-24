<?php namespace App\Services\Db\Servers;

use App\Models\Server;
use Illuminate\Support\Str;
use Validator;

class UpdateServerService extends ServerService
{

    public function execute(array $data, $id)
    {
        $Server = Server::find($id);
        $Server->slug = Str::slug($data['name']);
        $Server->login = $data['login'];
        $Server->name = $data['name'];
        $Server->ip = $data['ip'];

        return $Server->save();
    }

}
