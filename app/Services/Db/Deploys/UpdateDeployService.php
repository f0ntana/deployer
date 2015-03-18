<?php namespace App\Services\Db\Deploys;

use App\Models\Deploy;

class UpdateDeployService extends DeployService
{

    public function execute(array $data, $id)
    {
        $Deploy = Deploy::find($id);
        $Deploy->environment_id = $data['environment_id'];
        $Deploy->project_id = $data['project_id'];
        $Deploy->commit = $data['commit'];
        $Deploy->branch = $data['branch'];

        return $Deploy->save();
    }

}
