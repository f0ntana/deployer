<?php

use App\Models\Server;
use Illuminate\Database\Seeder;

class ServerTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('servers')->delete();

        Server::create([
            'slug' => 'fc-master',
            'name' => 'FC MASTER',
            'ip' => '177.12.163.105',
        ]);

        Server::create([
            'slug' => 'fc-slave',
            'name' => 'FC SLAVE',
            'ip' => '177.12.163.106',
        ]);

        Server::create([
            'slug' => 'fc-homologacao',
            'name' => 'FC HOMOLOGAÇÃO',
            'ip' => '177.12.163.105',
        ]);
    }

}