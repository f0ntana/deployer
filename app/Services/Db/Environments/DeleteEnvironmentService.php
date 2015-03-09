<?php namespace App\Services\Db\Environments;

use App\Models\Environment;
use Validator;

class DeleteEnvironmentService extends EnvironmentService
{

    public function execute($id)
    {
        $Environment = Environment::find($id);

        if ($Environment->delete()) {
            return true;
        }

        return false;
    }

}
