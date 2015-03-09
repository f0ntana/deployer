<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
        Model::unguard();

        $this->call('RoleTableSeeder');
        $this->call('ActionTableSeeder');
        $this->call('UserTableSeeder');
        $this->call('ProjectTableSeeder');
        $this->call('ServerTableSeeder');
        $this->call('EnvironmentTableSeeder');
    }

}
