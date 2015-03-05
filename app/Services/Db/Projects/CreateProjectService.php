<?php namespace App\Services\Db\Projects;

use App\Models\Project;
use Illuminate\Support\Str;
use Validator;

class CreateProjectService extends ProjectService
{

    public function execute(array $data)
    {
        return Project::create([
            'slug' => Str::slug($data['name']),
            'name' => $data['name'],
        ]);
    }

}
