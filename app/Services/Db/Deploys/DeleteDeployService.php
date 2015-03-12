<?php namespace App\Services\Db\Deploys;

use App\Models\Deploy;
use Validator;

class DeleteDeployService extends DeployService
{

    public function execute($id)
    {
        $Deploy = Deploy::find($id);

        if ($Deploy->delete()) {
            return true;
        }

        return false;
    }

}
