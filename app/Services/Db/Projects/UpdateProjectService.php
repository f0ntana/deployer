<?php namespace App\Services\Db\Projects;

use App\Models\Project;
use Illuminate\Support\Str;
use Validator;

class UpdateProjectService extends ProjectService
{

    public function execute(array $data, $id)
    {
        $Project = Project::find($id);
        $Project->slug = Str::slug($data['name']);
        $Project->name = $data['name'];
        $Project->repository = $data['repository'];
        $Project->envoy = $data['envoy'];

        return $Project->save();
    }

}
