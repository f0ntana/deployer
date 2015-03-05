<?php namespace App\Services\Db\Projects;

use App\Models\Project;
use Validator;

class UpdateProjectService extends ProjectService
{

    public function execute(array $data, $id)
    {
        $Project = Project::find($id);
        $Project->role_id = $data['role_id'];
        $Project->name = $data['name'];

        return $Project->save();
    }

}
