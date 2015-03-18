<?php

use App\Models\Environment;
use Illuminate\Database\Seeder;

class EnvironmentTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('environments')->delete();

        Environment::create([
            'slug' => 'fc-producao',
            'name' => 'FC PRODUÇÃO',
            'folder' => 'prod',
            'password' => 'pwd',
        ]);

        Environment::create([
            'slug' => 'fc-homologacao',
            'name' => 'FC HOMOLOGAÇÃO',
            'folder' => 'hm',
        ]);
    }

}