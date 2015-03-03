<?php namespace App\Services\Db\Actions;

use App\Models\Action;
use Validator;

class DeleteActionService extends ActionService
{

    public function execute($id)
    {
        $Action = Action::find($id);

        if ($Action->delete()) {
            return true;
        }

        return false;
    }

}
