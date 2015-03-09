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
        ]);

        Environment::create([
            'slug' => 'fc-homologacao-1',
            'name' => 'FC HOMOLOGAÇÃO 1',
            'folder' => 'hm-1',
        ]);

        Environment::create([
            'slug' => 'fc-homologacao-2',
            'name' => 'FC HOMOLOGAÇÃO 2',
            'folder' => 'hm-2',
        ]);

        Environment::create([
            'slug' => 'fc-homologacao-3',
            'name' => 'FC HOMOLOGAÇÃO 3',
            'folder' => 'hm-3',
        ]);
    }

}