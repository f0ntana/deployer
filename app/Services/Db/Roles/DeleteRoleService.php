<?php namespace App\Services\Db\Roles;

use App\Models\Role;
use Validator;

class DeleteRoleService extends RoleService
{

    public function execute($id)
    {
        $Role = Role::find($id);

        if ($Role->delete()) {
            return true;
        }

        return false;
    }

}
