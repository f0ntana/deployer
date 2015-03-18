<?php namespace App\Services\Db\Deploys;

use App\Models\Deploy;
use Auth;
use Validator;

class CreateDeployService extends DeployService
{

    public function execute(array $data)
    {
        return Deploy::create([
            'user_id' => Auth::user()->id,
            'environment_id' => $data['environment_id'],
            'project_id' => $data['project_id'],
            'commit' => $data['commit'],
            'branch' => $data['branch'],
        ]);
    }

}
