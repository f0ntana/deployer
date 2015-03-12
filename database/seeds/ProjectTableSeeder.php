<?php

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('projects')->delete();

        Project::create([
            'slug' => 'fc-dev-aws',
            'name' => 'FC-DEV-AWS',
            'repository' => 'git@github.com:LojasKD/FC-DEV-AWS.git',
            'folder' => '/var/www/repositorios{env}/FC-DEV',
            'envoy' => file_get_contents(storage_path('app/envoy.blade.php')),
        ]);

        Project::create([
            'slug' => 'fc-frontend-aws',
            'name' => 'FC-FrontEnd-AWS',
            'repository' => 'git@github.com:LojasKD/FC-FrontEnd-AWS.git',
            'folder' => '/var/www/repositorios{env}/FC-FrontEnd',
            'envoy' => file_get_contents(storage_path('app/envoy.blade.php')),
        ]);
    }

}