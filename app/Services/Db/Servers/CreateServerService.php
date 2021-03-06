<?php namespace App\Services\Db\Servers;

use App\Models\Server;
use Illuminate\Support\Str;
use Validator;

class CreateServerService extends ServerService
{

    public function execute(array $data)
    {
        return Server::create([
            'slug' => Str::slug($data['name']),
            'login' => $data['login'],
            'name' => $data['name'],
            'ip' => $data['ip'],
        ]);
    }

}
