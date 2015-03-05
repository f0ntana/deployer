<?php namespace App\Services\Db\Projects;

use App\Models\Project;
use Validator;

class DeleteProjectService extends ProjectService
{

    public function execute($id)
    {
        $Project = Project::find($id);

        if ($Project->delete()) {
            return true;
        }

        return false;
    }

}
