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
            'folder' => '/var/www/repositorios',
        ]);

        Server::create([
            'slug' => 'fc-slave',
            'name' => 'FC SLAVE',
            'folder' => '/var/www/repositorios',
        ]);

        Server::create([
            'slug' => 'fc-homologacao',
            'name' => 'FC HOMOLOGAÇÃO',
            'folder' => '/var/www/repositorios',
        ]);
    }

}