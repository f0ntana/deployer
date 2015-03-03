<?php namespace App\Services\Db\Actions;

use App\Models\Action;
use Validator;

class UpdateActionService extends ActionService
{

    public function execute(array $data, $id)
    {
        $Action = Action::find($id);
        $Action->action_id = $data['action_id'];
        $Action->action = $data['action'];
        $Action->order = $data['order'];
        $Action->type = $data['type'];
        $Action->name = $data['name'];

        return $Action->save();
    }

}
