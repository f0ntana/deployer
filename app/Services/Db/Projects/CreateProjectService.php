<?php namespace App\Services\Db\Projects;

use App\Models\Project;
use Validator;

class CreateProjectService extends ProjectService
{

    public function execute(array $data)
    {
        return Project::create([
            'role_id' => $data['role_id'],
            'name' => $data['name'],
        ]);
    }

}
